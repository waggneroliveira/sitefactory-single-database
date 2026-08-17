<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class TenantController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/tenant/';

    
    public function index(ThemeManager $themeManager)
    {
        $tenant = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $plans = Plan::with(['moduleLimits', 'tenants'])
        ->withCount('tenants')
        ->orderBy('id', 'desc')
        ->get();
        $availableModules = $themeManager->availableModules();
        $templateThemes = TemplateTheme::orderBy('name', 'ASC')->get();
        
        return view('admin.blades.tenant.index', compact('tenant', 'theme', 'themeData', 'plans', 'templateThemes', 'availableModules'));
    }

    public function store(Request $request, ThemeManager $themeManager)
    {
        $tenant = Tenant::current();

        if (!$tenant) {
            Alert::error('Erro', 'Tenant não encontrado.');
            return redirect()->back();
        }

        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
        ]);

        $manager = new ImageManager(GdDriver::class);

        try {
            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Logo Header
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_header')) {
                $file = $request->file('path_image_logo_header');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                ) . '.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
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
                        ->toWebp(quality: 85)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_header'] =
                    $this->pathUpload . $filename;
            }

            /*
            |--------------------------------------------------------------------------
            | Logo Footer
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_footer')) {
                $file = $request->file('path_image_logo_footer');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                ) . '_footer.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
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
                        ->toWebp(quality: 85)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                $data['path_image_logo_footer'] =
                    $this->pathUpload . $filename;
            }

            $tenant->create($data);
            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_create')
            );
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error(
                'Erro',
                __('dashboard.response_item_error_create')
            );

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function update(Request $request, Tenant $tenant, ThemeManager $themeManager)
    {
        $tenant = Tenant::current();

        $data = $request->except([
            'path_image_logo_header',
            'path_image_logo_footer',
        ]);
     
        $manager = new ImageManager(GdDriver::class);

        try {
            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Logo Header
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_header')) {
                $file = $request->file('path_image_logo_header');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                ) . '.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
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
                        ->toWebp(quality: 85)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                if ($tenant->path_image_logo_header) {
                    Storage::delete(
                        $tenant->path_image_logo_header
                    );
                }

                $data['path_image_logo_header'] =
                    $this->pathUpload . $filename;
            }

            /*
            |--------------------------------------------------------------------------
            | Remover Logo Header
            |--------------------------------------------------------------------------
            */

            if ($request->has('delete_path_image_logo_header')) {
                if ($tenant->path_image_logo_header) {
                    Storage::delete(
                        $tenant->path_image_logo_header
                    );
                }

                $data['path_image_logo_header'] = null;
            }

            /*
            |--------------------------------------------------------------------------
            | Logo Footer
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('path_image_logo_footer')) {
                $file = $request->file('path_image_logo_footer');
                $mime = $file->getMimeType();
                $extension = strtolower($file->getClientOriginalExtension());

                $filename = pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                ) . '_footer.webp';

                if ($mime === 'image/svg+xml' || $extension === 'svg') {
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
                        ->toWebp(quality: 85)
                        ->toString();

                    Storage::put(
                        $this->pathUpload . $filename,
                        $image
                    );
                }

                if ($tenant->path_image_logo_footer) {
                    Storage::delete(
                        $tenant->path_image_logo_footer
                    );
                }

                $data['path_image_logo_footer'] =
                    $this->pathUpload . $filename;
            }

            /*
            |--------------------------------------------------------------------------
            | Remover Logo Footer
            |--------------------------------------------------------------------------
            */

            if ($request->has('delete_path_image_logo_footer')) {
                if ($tenant->path_image_logo_footer) {
                    Storage::delete(
                        $tenant->path_image_logo_footer
                    );
                }

                $data['path_image_logo_footer'] = null;
            }
            $tenant->update($data);

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_update')
            );
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error(
                'Erro',
                __('dashboard.response_item_error_update')
            );

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function destroy(Tenant $tenant)
    {
        if ($tenant->path_image_logo_header) {
            Storage::delete(
                $tenant->path_image_logo_header
            );
        }

        if ($tenant->path_image_logo_footer) {
            Storage::delete(
                $tenant->path_image_logo_footer
            );
        }

        $tenant->delete();

        Session::flash(
            'success',
            __('dashboard.response_item_delete')
        );

        return redirect()->back();
    }
}