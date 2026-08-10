<?php

namespace App\Modules\Admin\Business;

use App\Models\User;
use App\Repositories\SettingThemeRepository;
use App\Services\ThemeManager;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function getDashboardData(ThemeManager $themeManager): array
    {
        $currentUser = Auth::user();
        $user = User::where('id', $currentUser->id)->active()->first();
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        
        return compact('user', 'settingTheme', 'theme', 'themeData');
    }
}
