<?php

namespace App\Modules\Admin\Presentation\Controllers;

use App\Modules\Admin\Business\DashboardService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController
{
    public function __construct(protected DashboardService $service)
    {
    }

    public function index(): View|RedirectResponse
    {
        $data = $this->service->getDashboardData();
        $user = $data['user'] ?? null;

        if ($user) {
            return view('admin.dashboard', $data);
        }

        return redirect()->route('admin.dashboard.painel');
    }
}
