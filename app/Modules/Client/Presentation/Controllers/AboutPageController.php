<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\AboutPageService;
use App\Services\ThemeManager;
use Illuminate\View\View;

class AboutPageController
{
    public function __construct(protected AboutPageService $service)
    {
    }

    public function index(ThemeManager $theme): View
    {
        $data = $this->service->getPageData($theme);

        return view($theme->view('index'), $data);
    }
}
