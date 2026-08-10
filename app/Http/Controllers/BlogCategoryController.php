<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use App\Http\Requests\BlogCategoryRequestUpdate;
use App\Models\BlogCategory;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCategoryController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/blogCategory/';
    public function index(ThemeManager $themeManager)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('categorias de noticias.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $blogCategories = BlogCategory::sorting()->get();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return view('admin.blades.blogCategory.index', compact('blogCategories', 'theme', 'themeData'));
    }

    public function store(BlogCategoryRequest $request){
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        $data['slug'] = Str::slug($request->title);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

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
                BlogCategory::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();            
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(BlogCategoryRequestUpdate $request, BlogCategory $blogCategory)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        $data['slug'] = Str::slug($request->title);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

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

            Storage::delete(isset($blogCategory->path_image)??$blogCategory->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($blogCategory->path_image)??$blogCategory->path_image);
            $data['path_image'] = null;
        }

        try {
            DB::beginTransaction();
                $blogCategory->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(BlogCategory $blogCategory)
    {
        Storage::delete(isset($blogCategory->path_image)??$blogCategory->path_image);
        $blogCategory->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $blogCategoryId) {
            $blogCategory = BlogCategory::find($blogCategoryId);
    
            if ($blogCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blogCategory)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $blogCategoryId,
                            'title' => $blogCategory->title,
                            'slug' => $blogCategory->slug,
                            'sorting' => $blogCategory->sorting,
                            'active' => $blogCategory->active,
                            'path_image' => $blogCategory->path_image,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $blogCategoryId não encontrado.");
            }
        }
    
        $deleted = BlogCategory::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $blogCategory = BlogCategory::find($id);
    
            if ($blogCategory) {
                $blogCategory->sorting = $sorting;
                $blogCategory->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($blogCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blogCategory)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $blogCategory->title,
                            'slug' => $blogCategory->slug,
                            'sorting' => $blogCategory->sorting,
                            'active' => $blogCategory->active,
                            'path_image' => $blogCategory->path_image,
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
