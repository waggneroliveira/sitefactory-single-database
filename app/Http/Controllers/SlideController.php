<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperArchive;
use App\Models\Slide;
use App\Modules\Admin\Business\ContentLimitService;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use Log;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/slide/';
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        $check = checkPermission('slides', 'slide.visualizar', $settingTheme);

        if ($check !== true) {
            return $check;
        }

        $slides = Slide::sorting()->get();

        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $slideLimit = $themeManager->getLimit('slides', 0);

        return view('admin.blades.slide.index', compact(
            'slides',
            'settingTheme',
            'theme',
            'themeData',
            'slideLimit'
        ));
    }

    public function store(Request $request, ThemeManager $themeManager)
    {
        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_image_mobile' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        ]);

        $limit = $themeManager->getLimit('slides', 0);
        $currentCount = Slide::count();

        if ($limit !== null && $currentCount >= $limit) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'limit' => "O limite de {$limit} slides foi atingido."
                ]);
        }

        $data = $request->except(['path_image', 'path_image_mobile']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

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

        if ($request->hasFile('path_image_mobile')) {
            $fileMobile = $request->file('path_image_mobile');
            $mimeMobile = $fileMobile->getMimeType();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_mobile.webp';

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

            $data['path_image_mobile'] = $this->pathUpload . $filenameMobile;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Slide::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }   

    public function update(Request $request, Slide $slide)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        // Slide desktop
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

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

            Storage::delete(isset($slide->path_image)??$slide->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($slide->path_image)??$slide->path_image);
            $data['path_image'] = null;
        }

        // Slide mobile
        if ($request->hasFile('path_image_mobile')) {
            $fileMobile = $request->file('path_image_mobile');
            $mimeMobile = $fileMobile->getMimeType();
            $filenameMobile = pathinfo($fileMobile->getClientOriginalName(), PATHINFO_FILENAME) . '_mobile.webp';

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

            Storage::delete($slide->path_image_mobile?$slide->path_image_mobile:'');
            $data['path_image_mobile'] = $this->pathUpload . $filenameMobile;
        }

        if (isset($request->delete_path_image_mobile)) {
            Storage::delete($slide->path_image_mobile?$slide->path_image_mobile:'');
            $data['path_image_mobile'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $slide->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }


    public function destroy(Slide $slide)
    {
        Storage::delete(isset($slide->path_image)??$slide->path_image);
        Storage::delete(isset($slide->path_image_mobile)??$slide->path_image_mobile);
        $slide->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $slideId) {
            $slide = Slide::find($slideId);
    
            if ($slide) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $slideId,
                            'path_image' => $slide->path_image,
                            'path_image_mobile' => $slide->path_image_mobile,
                            'title' => $slide->title,
                            'description' => $slide->description,
                            'sorting' => $slide->sorting,
                            'active' => $slide->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $slideId não encontrado.");
            }
        }
    
        $deleted = Slide::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $slide = Slide::find($id);
    
            if ($slide) {
                $slide->sorting = $sorting;
                $slide->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($slide) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'path_image' => $slide->path_image,
                            'path_image_mobile' => $slide->path_image_mobile,
                            'title' => $slide->title,
                            'description' => $slide->description,
                            'sorting' => $slide->sorting,
                            'active' => $slide->active,
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
