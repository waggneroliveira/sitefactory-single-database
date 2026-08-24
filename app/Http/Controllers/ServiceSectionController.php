<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceSectionController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/serviceSection/';

    public function store(Request $request)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $data['active'] = $request->active ? 1 : 0;

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

        try {
            DB::beginTransaction();
            ServiceSection::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, ServiceSection $serviceSection)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active ? 1 : 0;
        
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

            Storage::delete(isset($serviceSection->path_image)??$serviceSection->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($serviceSection->path_image)??$serviceSection->path_image);
            $data['path_image'] = null;
        }
        try {
            DB::beginTransaction();
            $serviceSection->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSection $serviceSection)
    {
        Storage::delete(isset($serviceSection->path_image)??$serviceSection->path_image);
        $serviceSection->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
