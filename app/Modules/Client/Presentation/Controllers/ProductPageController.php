<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\ProductPageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductPageController
{
    public function __construct(protected ProductPageService $service)
    {
    }

    public function productAll(Request $request)
    {
        $data = $this->service->getProductListData($request);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('client.includes.products', compact('data'))->render(),
                'title' => $data['title'],
            ]);
        }

        return view('client.blades.products', $data);
    }

    public function productView($category = null, $slug = null)
    {
        $data = $this->service->getProductViewData($category, $slug);

        if (isset($data['view'])) {
            return view($data['view']);
        }

        return view('client.blades.product', $data);
    }
}
