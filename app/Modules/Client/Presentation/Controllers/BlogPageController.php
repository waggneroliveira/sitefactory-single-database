<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\BlogPageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPageController
{
    public function __construct(protected BlogPageService $service)
    {
    }

    public function index(Request $request, $category = null): View
    {
        $data = $this->service->getIndexData($request, $category);

        return view('client.blades.blog', $data);
    }

    public function blogInner($slug = null)
    {
        $data = $this->service->getInnerData($slug);

        if (isset($data['view'])) {
            return view($data['view']);
        }

        view()->share('blogInner', $data['blogInner']);

        return view('client.blades.blog-inner', $data);
    }
}
