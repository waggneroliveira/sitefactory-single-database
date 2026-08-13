<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanModuleLimit;
use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Models\TenantModuleLimit;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;
class SystemClientController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/tenant/';
    public function index(Request $request, ThemeManager $themeManager)
    {
        $clients = Tenant::query()
            ->with('plan')
            ->orderBy('name', 'asc')
            ->paginate(20);

        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return view('admin.blades.client-of-system.index', compact(
            'clients',
            'theme',
            'themeData'
        ));
    }

    public function create(ThemeManager $themeManager)
    {
        $plans = Plan::where('active', true)->get();
        $availableModules = $themeManager->availableModules();

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->get();
        return view('admin.blades.client-of-system.create', compact(
            'plans',
            'availableModules',
            'theme',
            'themeData',
            'templateThemes',
        ));
    }

    public function store(Request $request)
    {
        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
        ]);

        $manager = new ImageManager(GdDriver::class);
        $data['cnpj'] = !empty($data['cnpj']) ? preg_replace('/\D/', '', $data['cnpj']) : null;
       
        DB::beginTransaction();

        try {
            if ($request->hasFile('path_image_logo_header')) {
                $file = $request->file('path_image_logo_header');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.svg';

                    Storage::putFileAs(
                        $this->pathUpload,
                        $file,
                        $filename
                    );
                } else {
                    $image = $manager->read($file)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_header'] = $this->pathUpload . $filename;
            }

            if ($request->hasFile('path_image_logo_footer')) {
                $file = $request->file('path_image_logo_footer');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_footer.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_footer.svg';

                    Storage::putFileAs(
                        $this->pathUpload,
                        $file,
                        $filename
                    );
                } else {
                    $image = $manager->read($file)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_footer'] = $this->pathUpload . $filename;
            }

            $tenant = new Tenant();

            $tenant->fill($data);

            $tenant->save();

            foreach ($data['limits'] ?? [] as $module => $limit) {
                if ($limit === null || $limit === '') {
                    continue;
                }

                TenantModuleLimit::updateOrCreate(
                    [
                        'tenant_id' => $tenant->id,
                        'module' => $module,
                    ],
                    [
                        'limit' => (int) $limit,
                    ]
                );
            }

            DB::commit();

            return redirect()
                ->route('admin.dashboard.tenants.index')
                ->with('success', 'Cliente criado com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error(
                'Erro',
                __('dashboard.response_item_error_create')
            );

            return redirect()->back();
        }
    }

    public function show(Tenant $tenant, ThemeManager $themeManager)
    {
        $tenant->load('plan');

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->first();
        return view('admin.blades.client-of-system.show', compact(
            'tenant',
            'theme',
            'themeData',
            'templateThemes',
        ));
    }

    public function edit(Tenant $tenant, ThemeManager $themeManager)
    {
        $plans = Plan::where('active', true)->get();

        $availableModules = $themeManager->availableModules();

        $tenantModuleLimits = TenantModuleLimit::where('tenant_id', $tenant->id)
            ->get()
            ->keyBy('module');

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->get();

        return view('admin.blades.client-of-system.edit', compact(
            'tenant',
            'plans',
            'availableModules',
            'tenantModuleLimits',
            'theme',
            'themeData',
            'templateThemes'
        ));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
        ]);
        $data = $request->all();
        
        $manager = new ImageManager(GdDriver::class);

        DB::beginTransaction();

        try {
            if ($request->hasFile('path_image_logo_header')) {
                $file = $request->file('path_image_logo_header');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.svg';

                    Storage::putFileAs(
                        $this->pathUpload,
                        $file,
                        $filename
                    );
                } else {
                    $image = $manager->read($file)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_header'] = $this->pathUpload . $filename;
            }

            if ($request->hasFile('path_image_logo_footer')) {
                $file = $request->file('path_image_logo_footer');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_footer.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_footer.svg';

                    Storage::putFileAs(
                        $this->pathUpload,
                        $file,
                        $filename
                    );
                } else {
                    $image = $manager->read($file)
                        ->resize(null, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->toWebp(quality: 95)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_footer'] = $this->pathUpload . $filename;
            }
            $data['cnpj'] = !empty($data['cnpj']) ? preg_replace('/\D/', '', $data['cnpj']) : null;

            $tenant->update($data);
            foreach ($data['limits'] ?? [] as $module => $limit) {
                if ($limit === null || $limit === '') {
                    continue;
                }

                TenantModuleLimit::updateOrCreate(
                    [
                        'tenant_id' => $tenant->id,
                        'module' => $module,
                    ],
                    [
                        'limit' => (int) $limit,
                    ]
                );
            }

            DB::commit();

            return redirect()
                ->route('admin.dashboard.tenants.index')
                ->with('success', 'Cliente criado com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error(
                'Erro',
                __('dashboard.response_item_error_create')
            );

            return redirect()->back();
        }

        // return redirect()
        //     ->route('admin.dashboard.tenants.index')
        //     ->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Tenant $tenant)
    {
        DB::transaction(function () use ($tenant) {
            TenantModuleLimit::where('tenant_id', $tenant->id)->delete();
            $tenant->delete();
        });

        return redirect()
            ->route('admin.dashboard.tenants.index')
            ->with('success', 'Cliente excluído com sucesso.');
    }
}

