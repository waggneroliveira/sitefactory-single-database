<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\ContactPageService;
use App\Services\ThemeManager;
use Illuminate\View\View;

class ContactPageController
{
    public function __construct(protected ContactPageService $service)
    {
    }

    public function index(ThemeManager $theme): View
    {
        $data = $this->service->getPageData($theme);

        return view($theme->view('contact'), $data);
    }
}
