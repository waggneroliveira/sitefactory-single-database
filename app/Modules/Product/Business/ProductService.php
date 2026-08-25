<?php

namespace App\Modules\Product\Business;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ServiceSection;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;

class ProductService
{
    protected string $pathUpload = 'admin/uploads/images/product/';

    public function getIndexData(Request $request, ThemeManager $themeManager): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        $check = checkPermission('products', 'produtos.visualizar', $settingTheme);
        if ($check !== true) {
            return ['forbidden' => $check];
        }
        $serviceSection = ServiceSection::whereIn('section', ['product'])
        ->get()
        ->keyBy('section');

        $categories = ProductCategory::active()->sorting()->get();
        $productsQuery = Product::with(['category']);

        if ($request->filled('title')) {
            $productsQuery->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('product_category_id')) {
            $productsQuery->where('product_category_id', $request->product_category_id);
        }

        $products = $productsQuery->sorting()->paginate(60)->withQueryString();
        $productCategory = [];
        foreach ($categories as $category) {
            $productCategory[$category->id] = $category->title;
        }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return compact('products', 'categories', 'productCategory', 'theme', 'themeData', 'settingTheme', 'serviceSection');
    }

    public function getCreateData(ThemeManager $themeManager): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasRole('Super') && !$user->can('usuario.tornar usuario master') && !($user->hasPermissionTo('produtos.visualizar') && $user->hasPermissionTo('produtos.criar'))) {
            return ['forbidden' => view('admin.error.403', compact('settingTheme'))];
        }

        $categories = ProductCategory::active()->sorting()->get();
        $brands = Brand::active()->sorting()->get();
        $productCategory = [];
        foreach ($categories as $category) {
            $productCategory[$category->id] = $category->title;
        }
        $productBrand = [];
        foreach ($brands as $brand) {
            $productBrand[$brand->id] = $brand->title;
        }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return compact('categories', 'productCategory', 'productBrand', 'theme', 'themeData');
    }

    public function getEditData(Product $product, ThemeManager $themeManager): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasRole('Super') && !$user->can('usuario.tornar usuario master') && !($user->hasPermissionTo('produtos.visualizar') && $user->hasPermissionTo('produtos.editar'))) {
            return ['forbidden' => view('admin.error.403', compact('settingTheme'))];
        }

        $product = $product->with(['galleries' => function ($query) {
            $query->orderBy('sorting', 'ASC');
        }])->find($product->id);

        $categories = ProductCategory::active()->sorting()->get();
        $brands = Brand::active()->sorting()->get();
        $productCategory = [];
        foreach ($categories as $category) {
            $productCategory[$category->id] = $category->title;
        }
        $productBrand = [];
        foreach ($brands as $brand) {
            $productBrand[$brand->id] = $brand->title;
        }
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return compact('product', 'categories', 'productCategory', 'productBrand', 'theme', 'themeData');
    }

    public function store(ProductStoreRequest $request): Product
    {
        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0;
        $data['slug'] = Str::slug($request->title);

        if (isset($data['sizes'])) {
            $sizes = array_values(array_filter($request->sizes, function ($size) {
                return !is_null($size) && trim($size) !== '';
            }));
            $data['sizes'] = !empty($sizes) ? json_encode($sizes) : json_encode([]);
        } else {
            $data['sizes'] = null;
        }

        $manager = new ImageManager(new GdDriver());

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';
            Storage::putFileAs($this->pathUpload, $file, $filename);
            $data['path_file'] = $this->pathUpload . $filename;
        }

        DB::beginTransaction();
        $product = Product::create($data);
        DB::commit();

        return $product;
    }

    public function uploadImageCkeditor(Request $request): array
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $pathUpload = 'uploads/product_images/';
            $manager = ImageManager::gd();

            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($pathUpload . $filename, $image);
            }

            return [
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => asset('storage/' . $pathUpload . $filename),
            ];
        }

        return [
            'uploaded' => 0,
            'error' => ['message' => 'Upload falhou.'],
        ];
    }

    public function update(ProductUpdateRequest $request, Product $product): Product
    {
        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0;
        $data['slug'] = Str::slug($request->title);
        $manager = new ImageManager(new GdDriver());

        $request->validate([
            'sizes' => 'array|nullable',
            'sizes.*' => 'string|max:50|nullable',
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_file' => ['nullable', 'file', 'mimes:pdf', 'max:3072'],
        ]);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }
            if (!empty($product->path_image)) {
                Storage::disk('public')->delete($product->path_image);
            }
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if ($request->has('delete_path_image')) {
            if (!empty($product->path_image)) {
                Storage::disk('public')->delete($product->path_image);
            }
            $data['path_image'] = null;
        }

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';
            if (!empty($product->path_file) && Storage::exists($product->path_file)) {
                Storage::delete($product->path_file);
            }
            Storage::putFileAs($this->pathUpload, $file, $filename);
            $data['path_file'] = $this->pathUpload . $filename;
        }

        if ($request->has('delete_path_file')) {
            if (!empty($product->path_file) && Storage::exists($product->path_file)) {
                Storage::delete($product->path_file);
            }
            $data['path_file'] = null;
        }

        DB::beginTransaction();
        $product->fill($data)->save();
        DB::commit();

        return $product;
    }

    public function delete(Product $product): void
    {
        Storage::delete($product->path_image ?? '');
        Storage::delete($product->path_file ?? '');
        $product->delete();
    }

    public function destroySelected(Request $request): array
    {
        foreach ($request->deleteAll as $productId) {
            $product = Product::find($productId);

            if ($product) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($product)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $productId,
                            'title' => $product->title,
                            'slug' => $product->slug,
                            'sizes' => $product->sizes,
                            'description' => $product->description,
                            'text' => $product->text,
                            'path_image' => $product->path_image,
                            'path_file' => $product->path_file,
                            'active' => $product->active,
                            'sorting' => $product->sorting,
                            'event' => 'multiple_deleted',
                        ],
                    ])
                    ->log('multiple_deleted');
            } else {
                Log::warning("Item com ID {$productId} não encontrado.");
            }
        }

        $deleted = Product::whereIn('id', $request->deleteAll)->delete();

        return ['deleted' => $deleted];
    }

    public function sorting(Request $request): array
    {
        foreach ($request->arrId as $sorting => $id) {
            $product = Product::find($id);

            if ($product) {
                $product->sorting = $sorting;
                $product->save();

                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($product)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $product->title,
                            'slug' => $product->slug,
                            'sizes' => $product->sizes,
                            'description' => $product->description,
                            'text' => $product->text,
                            'path_image' => $product->path_image,
                            'active' => $product->active,
                            'sorting' => $product->sorting,
                            'event' => 'order_updated',
                        ],
                    ])
                    ->log('order_updated');
            } else {
                Log::warning("Item com ID {$id} não encontrado.");
            }
        }

        return ['status' => 'success'];
    }
}
