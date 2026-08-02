<?php

namespace App\Modules\Client\Presentation\Controllers;

use App\Modules\Client\Business\HomePageService;
use App\Services\ThemeManager;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class HomePageController
{
    public function __construct(protected HomePageService $service)
    {
    }

    public function index(ThemeManager $theme): View
    {
        $data = $this->service->getIndexData($theme);

        return view($theme->view('index'), $data);
    }

    public function filterByCategory($categorySlug = null): JsonResponse
    {
        $data = $this->service->filterByCategory($categorySlug);
        $html = view('client.ajax.filter-blog-homePage', [
            'latestNews' => $data['latestNews'],
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'count' => $data['allNews']->count(),
            'latest_count' => $data['latestNews']->count(),
        ]);
    }
}
