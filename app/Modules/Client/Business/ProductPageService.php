<?php

namespace App\Modules\Client\Business;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Tenant;
use App\Services\ThemeManager;
use Illuminate\Http\Request;

class ProductPageService
{
    public function getProductListData(Request $request, ThemeManager $themeManager): array
    {
        $category = $request->get('category');
        $brand = $request->get('brand');
        $search = $request->get('search');

        $products = Product::with(['category', 'brand'])
            ->whereHas('category', fn ($q) => $q->active())
            ->whereHas('brand', fn ($q) => $q->active())
            ->when($category && $category !== 'all', fn ($query) =>
                $query->whereHas('category', fn ($q) => $q->where('slug', $category)->active())
            )
            ->when($brand && $brand !== 'all', fn ($query) =>
                $query->whereHas('brand', fn ($q) => $q->where('slug', $brand)->active())
            )
            ->when($search, fn ($query) =>
                $query->where(fn ($q) =>
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                )
            )
            ->active()
            ->sorting()
            ->get();

        $productCategories = ProductCategory::whereHas('products', function ($query) {
            $query->active()->whereHas('brand', fn ($q) => $q->active());
        })
            ->active()
            ->sorting()
            ->get();

        $brands = Brand::whereHas('products', function ($query) {
            $query->active()->whereHas('category', fn ($q) => $q->active());
        })
        ->active()
        ->sorting()
        ->get();

        $title = 'Todos os Produtos';

        if ($category && $brand) {
            $categoryModel = ProductCategory::active()->where('slug', $category)->first();
            $brandModel = Brand::active()->where('slug', $brand)->first();

            if (!$categoryModel || !$brandModel) {
                $products = collect();
                $title = 'Nenhum produto encontrado';
            } else {
                $title = "{$categoryModel->title} - {$brandModel->title}";
            }
        } elseif ($category) {
            $categoryModel = ProductCategory::active()->where('slug', $category)->first();
            if ($categoryModel) {
                $title = $categoryModel->title;
            } else {
                $products = collect();
                $title = 'Nenhum produto encontrado';
            }
        } elseif ($brand) {
            $brandModel = Brand::active()->where('slug', $brand)->first();
            if ($brandModel) {
                $title = $brandModel->title;
            } else {
                $products = collect();
                $title = 'Nenhum produto encontrado';
            }
        }
        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        
        return compact('products', 'productCategories', 'brands', 'title', 'tenantTheme', 'theme', 'themeData');
    }

    public function getProductViewData($category = null, $slug = null, ThemeManager $themeManager): array
    {
        if (!$category || !$slug) {
            return ['view' => 'client.errors.404'];
        }
        
        $product = Product::with(['category', 'brand', 'galleries' => fn ($q) => $q->active()->sorting()])
            ->whereHas('category', fn ($q) => $q->active())
            ->whereHas('brand', fn ($q) => $q->active())
            ->where('slug', $slug)
            ->active()
            ->first();

        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();

        if ($product === null) {
            return ['view' => 'client.errors.404'];
        }

        return [
            'product' => $product,
            'theme' => $theme,
            'themeData' => $themeData,
            'tenantTheme' => $tenantTheme,
        ];
    }
}
