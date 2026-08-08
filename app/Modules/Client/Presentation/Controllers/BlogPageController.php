<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\BlogPageService;
use App\Services\ThemeManager;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPageController
{
    protected ThemeManager $theme;
    public function __construct(protected BlogPageService $service, ThemeManager $theme)
    {
        $this->theme = $theme;
    }

    public function index(Request $request, $category = null): View
    {
        $data = $this->service->getIndexData($request, $category, $this->theme);

        return view($this->theme->view('blog'), $data);
    }

    public function blogInner($slug = null)
    {
        $data = $this->service->getInnerData($slug, $this->theme);

        if (isset($data['view'])) {
            return view($data['view']);
        }

        view()->share('blogInner', $data['blogInner']);

        return view($this->theme->view('blog-inner'), $data);
    }
}
