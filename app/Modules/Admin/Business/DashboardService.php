<?php

namespace App\Modules\Admin\Business;

use App\Models\User;
use App\Repositories\SettingThemeRepository;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function getDashboardData(): array
    {
        $currentUser = Auth::user();
        $user = User::where('id', $currentUser->id)->active()->first();
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        return compact('user', 'settingTheme');
    }
}
