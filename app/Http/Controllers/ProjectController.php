<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Helpers\HelperArchive;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ProjectController extends Controller
{
    protected $pathUpload = 'admin/uploads/project/image/';
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->except(['path_image']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,svg,jpeg,png,gif,webp'],
        ]);

        $path_image = $helper->renameArchiveUpload($request, 'path_image', $this->pathUpload, true);
        if ($path_image) {
            $data['path_image'] = $this->pathUpload . $path_image;
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $path_image);
            } else {
                // Compressão webp com qualidade 75 para reduzir o peso
                $image = $manager->read($file)->toWebp(quality: 75)->toString();
                Storage::put($this->pathUpload . $path_image, $image);
            }
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
                Project::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        $path_image = $helper->renameArchiveUpload($request, 'path_image', $this->pathUpload, true);
        if ($path_image) {
            $data['path_image'] = $this->pathUpload . $path_image;
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $path_image);
            } else {
                // Compressão webp com qualidade 75 para reduzir o peso
                $image = $manager->read($file)->toWebp(quality: 75)->toString();
                Storage::put($this->pathUpload . $path_image, $image);
            }
            Storage::delete(isset($project->path_image)?$project->path_image:'');
        }
        if(isset($request->delete_path_image) && !$path_image){
            $inputFile = $request->delete_path_image;
            Storage::delete($project->$inputFile);
            $data['path_image'] = null;
        }

                try {
            DB::beginTransaction();
                $data['active'] = $request->active ? 1 : 0;
                
                $project->fill($data)->save();

                //project desktop 
                if ($path_image) {
                    Storage::delete($this->pathUpload . $path_image);
                }
                if ($path_image) {
                    $request->file('path_image')->storeAs($this->pathUpload, $path_image);
                }

            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Project $project)
    {
        Storage::delete(isset($project->path_image)??$project->path_image);
        $project->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
