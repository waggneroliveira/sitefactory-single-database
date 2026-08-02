<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\EventPageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventPageController
{
    public function __construct(protected EventPageService $service)
    {
    }

    public function index(Request $request): View
    {
        $data = $this->service->getPageData($request);

        return view('client.blades.event', $data);
    }
}
