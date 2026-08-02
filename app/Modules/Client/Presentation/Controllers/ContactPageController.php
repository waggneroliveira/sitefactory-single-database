<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\ContactPageService;
use Illuminate\View\View;

class ContactPageController
{
    public function __construct(protected ContactPageService $service)
    {
    }

    public function index(): View
    {
        $data = $this->service->getPageData();

        return view('client.blades.contact', $data);
    }
}
