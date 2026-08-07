<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
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

class ProductCategoryController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/productCategory/';
    public function index(Request $request, ThemeManager $theme)
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verifica permissão para visualizar slides
        $check = checkPermission('categorias de produtos.visualizar', $settingTheme);
        if ($check !== true) {
            return $check; // retorna view 403
        }

        $blogCategories = productCategory::sorting()->get();
        $themeData = $theme->theme();
        return view('admin.blades.productCategory.index', compact('blogCategories', 'themeData'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        $data['highlight'] = $request->highlight ? 1 : 0;
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
                ProductCategory::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();            
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        $data['highlight'] = $request->highlight ? 1 : 0;
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

            Storage::delete(isset($productCategory->path_image)??$productCategory->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($productCategory->path_image)??$productCategory->path_image);
            $data['path_image'] = null;
        }

        try {
            DB::beginTransaction();
                $productCategory->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(ProductCategory $productCategory)
    {
        Storage::delete(isset($productCategory->path_image)??$productCategory->path_image);
        $productCategory->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $productCategoryId) {
            $productCategory = ProductCategory::find($productCategoryId);
    
            if ($productCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($productCategory)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $productCategoryId,
                            'title' => $productCategory->title,
                            'slug' => $productCategory->slug,
                            'sorting' => $productCategory->sorting,
                            'active' => $productCategory->active,
                            'path_image' => $productCategory->path_image,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $productCategoryId não encontrado.");
            }
        }
    
        $deleted = ProductCategory::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $productCategory = ProductCategory::find($id);
    
            if ($productCategory) {
                $productCategory->sorting = $sorting;
                $productCategory->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($productCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($productCategory)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $productCategory->title,
                            'slug' => $productCategory->slug,
                            'sorting' => $productCategory->sorting,
                            'active' => $productCategory->active,
                            'path_image' => $productCategory->path_image,
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
