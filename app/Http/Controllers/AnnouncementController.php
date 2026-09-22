<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperArchive;
use App\Models\Announcement;
use App\Models\Tenant;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class AnnouncementController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/anuncio/';

    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // 'slides' → é o módulo definido no template_modules.php.
        // 'slide.visualizar' → é a permissão definida no module_permissions.php.
        $check = checkPermission('announcement', 'anuncios.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $announcements = Announcement::get();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $aboutLimit = $themeManager->getLimit('about', 0);
        $tenants = Tenant::get();

        return view('admin.blades.announcement.index', compact('tenants', 'announcements', 'theme', 'themeData', 'aboutLimit'));
    }

    public function store(Request $request)
    {
        $data = $request->except([
            'starts_at',
            'ends_at',
            'tenant_id',
        ]);

        $tenantIds = $request->input('tenant_id', []);

        $data['starts_at'] = $request->filled('starts_at')
            ? Carbon::createFromFormat('Y-m-d\TH:i', $request->starts_at)
            : null;

        $data['ends_at'] = $request->filled('ends_at')
            ? Carbon::createFromFormat('Y-m-d\TH:i', $request->ends_at)
            : null;

        $manager = new ImageManager(new ImagickDriver());

        // Anúncio horizontal
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_horizontal.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            $data['path_image'] = $this->pathUpload . $filename;
        }

        // Anúncio horizontal mobile
        if ($request->hasFile('path_image_mobile')) {
            $file = $request->file('path_image_mobile');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_horizontal_mobile.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            $data['path_image_mobile'] = $this->pathUpload . $filename;
        }

        // Anúncio vertical
        if ($request->hasFile('path_image_vertical')) {
            $file = $request->file('path_image_vertical');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_vertical.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            $data['path_image_vertical'] = $this->pathUpload . $filename;
        }

        $data['active'] = $request->boolean('active');

        try {
            DB::beginTransaction();

            $announcement = Announcement::create($data);

            // Se for para clientes específicos, salva na tabela pivot.
            // Se for para todos, não precisa ter nenhum registro na pivot.
            if ($announcement->target === 'specific') {
                $announcement->tenants()->sync($tenantIds);
            } else {
                $announcement->tenants()->sync([]);
            }
            // dd($tenantIds, $announcement);
            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_create')
            );
        } catch (Exception $e) {
            DB::rollback();

            session()->flash(
                'error',
                __('dashboard.response_item_error_create')
            );
        }

        return redirect()->back();
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->except([
            'starts_at',
            'ends_at',
            'tenant_id',
        ]);

        $tenantIds = $request->input('tenant_id', []);

        $data['starts_at'] = $request->filled('starts_at')
            ? Carbon::createFromFormat('Y-m-d\TH:i', $request->starts_at)
            : null;

        $data['ends_at'] = $request->filled('ends_at')
            ? Carbon::createFromFormat('Y-m-d\TH:i', $request->ends_at)
            : null;

        $manager = new ImageManager(new ImagickDriver());

        // Anúncio horizontal
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_horizontal.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            if (!empty($announcement->path_image)) {
                Storage::delete($announcement->path_image);
            }

            $data['path_image'] = $this->pathUpload . $filename;
        }

        // Anúncio horizontal mobile
        if ($request->hasFile('path_image_mobile')) {
            $file = $request->file('path_image_mobile');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_horizontal_mobile.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            if (!empty($announcement->path_image_mobile)) {
                Storage::delete($announcement->path_image_mobile);
            }

            $data['path_image_mobile'] = $this->pathUpload . $filename;
        }

        // Excluir anúncio horizontal
        if ($request->boolean('delete_path_image')) {
            if (!empty($announcement->path_image)) {
                Storage::delete($announcement->path_image);
            }

            $data['path_image'] = null;
        }

        // Anúncio vertical
        if ($request->hasFile('path_image_vertical')) {
            $file = $request->file('path_image_vertical');
            $mime = $file->getMimeType();

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ) . '_vertical.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            if (!empty($announcement->path_image_vertical)) {
                Storage::delete($announcement->path_image_vertical);
            }

            $data['path_image_vertical'] = $this->pathUpload . $filename;
        }

        // Excluir anúncio vertical
        if ($request->boolean('delete_path_image_vertical')) {
            if (!empty($announcement->path_image_vertical)) {
                Storage::delete($announcement->path_image_vertical);
            }

            $data['path_image_vertical'] = null;
        }

        $data['active'] = $request->boolean('active');

        try {
            DB::beginTransaction();

            $announcement->fill($data)->save();

            // Atualiza os tenants relacionados
            if ($announcement->target === 'specific') {
                $announcement->tenants()->sync($tenantIds);
            } else {
                // Se mudou para "todos", remove os vínculos específicos
                $announcement->tenants()->sync([]);
            }

            DB::commit();

            session()->flash(
                'success',
                __('dashboard.response_item_update')
            );
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash(
                'error',
                __('dashboard.response_item_error_update')
            );
        }

        return redirect()->back();
    }

    public function destroy(Announcement $announcement)
    {
        Storage::delete(isset($announcement->path_image)??$announcement->path_image);
        Storage::delete(isset($announcement->path_image_mobile)??$announcement->path_image_mobile);
        Storage::delete(isset($announcement->path_image_vertical)??$announcement->path_image_vertical);
        $announcement->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $announcementId) {
            $announcement = Announcement::find($announcementId);
    
            if ($announcement) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($announcement)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $announcementId,
                            'link' => $announcement->link,
                            'path_image' => $announcement->path_image,
                            'path_image_mobile' => $announcement->path_image_mobile,
                            'path_image_vertical' => $announcement->path_image_vertical,
                            'sorting' => $announcement->sorting,
                            'active' => $announcement->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $announcementId não encontrado.");
            }
        }
    
        $deleted = Announcement::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $announcement = Announcement::find($id);
    
            if ($announcement) {
                $announcement->sorting = $sorting;
                $announcement->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($announcement) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($announcement)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'link' => $announcement->link,
                            'path_image' => $announcement->path_image,
                            'path_image_mobile' => $announcement->path_image_mobile,
                            'path_image_vertical' => $announcement->path_image_vertical,
                            'sorting' => $announcement->sorting,
                            'active' => $announcement->active,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
