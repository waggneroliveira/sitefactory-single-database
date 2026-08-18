<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\ProductPageService;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductPageController
{
    public function __construct(protected ProductPageService $service)
    {
    }

    public function productAll(Request $request, ThemeManager $theme)
    {
        $data = $this->service->getProductListData($request, $theme);

        if ($request->ajax()) {
            return response()->json([
                'html' => view($theme->includes('products'), $data)->render(),
                'title' => $data['title'],
            ]);
        }

        return view($theme->view('products'), $data);
    }

    public function productView($category = null, $slug = null, ThemeManager $theme)
    {
        $data = $this->service->getProductViewData($category, $slug, $theme);

        if (isset($data['view'])) {
            return view($data['view']);
        }
        
        return view($theme->view('product'), $data);
    }
}
