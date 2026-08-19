<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use App\Http\Controllers\Helpers\HelperArchive;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class AnnouncementController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/anuncio/';

    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
            !Auth::user()->can('usuario.tornar usuario master') &&
            !Auth::user()->hasPermissionTo('anuncio.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
        $announcements = Announcement::sorting()->get();
        
        return view('admin.blades.announcement.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $manager = new ImageManager(GdDriver::class);

        // anuncio horizontal
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_horizontal.webp';

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

        // anuncio horizontal mobile
        if ($request->hasFile('path_image_mobile')) {
            $file = $request->file('path_image_mobile');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_horizontal_mobile.webp';

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

        // anuncio vertical
        if ($request->hasFile('path_image_vertical')) {
            $fileMobile = $request->file('path_image_vertical');
            $mimeMobile = $fileMobile->getMimeType();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_vertical.webp';

            if ($mimeMobile === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $fileMobile, $filenameMobile);
            } else {
                $imageMobile = $manager->read($fileMobile)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filenameMobile, $imageMobile);
            }

            $data['path_image_vertical'] = $this->pathUpload . $filenameMobile;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
                Announcement::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }


    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        // Anuncio horizontal
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_horizontal.webp';

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

            Storage::delete(isset($announcement->path_image)??$announcement->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        // Anuncio horizontal mobile
        if ($request->hasFile('path_image_mobile')) {
            $file = $request->file('path_image_mobile');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_horizontal_mobile.webp';

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

            Storage::delete(isset($announcement->path_image_mobile)??$announcement->path_image_mobile);
            $data['path_image_mobile'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($announcement->path_image)??$announcement->path_image);
            $data['path_image'] = null;
        }

        // Anuncio vertical
        if ($request->hasFile('path_image_vertical')) {
            $fileMobile = $request->file('path_image_vertical');
            $mimeMobile = $fileMobile->getMimeType();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_vertical.webp';

            if ($mimeMobile === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $fileMobile, $filenameMobile);
            } else {
                $imageMobile = $manager->read($fileMobile)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filenameMobile, $imageMobile);
            }

            Storage::delete(isset($announcement->path_image_vertical) && $announcement->path_image_vertical != null ?? $announcement->path_image_vertical);
            $data['path_image_vertical'] = $this->pathUpload . $filenameMobile;
        }

        if (isset($request->delete_path_image_vertical)) {
            Storage::delete(isset($announcement->path_image_vertical) && $announcement->path_image_vertical != null ?? $announcement->path_image_vertical);
            $data['path_image_vertical'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
                $announcement->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', __('dashboard.response_item_error_update'));
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
