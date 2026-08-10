<?php

namespace App\Modules\Admin\Presentation\Controllers;

use App\Modules\Admin\Business\DashboardService;
use App\Services\ThemeManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController
{
    protected ThemeManager $theme;
    public function __construct(protected DashboardService $service, ThemeManager $theme)
    {
        $this->theme = $theme;
    }

    public function index(): View|RedirectResponse
    {
        $data = $this->service->getDashboardData($this->theme);
        $user = $data['user'] ?? null;
    // dd($data);
        if ($user) {
            return view('admin.dashboard', $data);
        }

        return redirect()->route('admin.dashboard.painel');
    }
}
