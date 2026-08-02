<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\AboutPageService;
use Illuminate\View\View;

class AboutPageController
{
    public function __construct(protected AboutPageService $service)
    {
    }

    public function index(): View
    {
        $data = $this->service->getPageData();

        return view('client.blades.about', $data);
    }
}
