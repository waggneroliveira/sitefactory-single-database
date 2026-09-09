<?php

namespace App\Modules\Client\Business;

use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Services\ThemeManager;
use Illuminate\Http\Request;

class TemplatePageService
{
    public function getTemplateListData(Request $request, ThemeManager $themeManager): array
    {
        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $search = $request->input('search');
        $templateThemes = TemplateTheme::active();
        
        if ($search) {
            $templateThemes = $templateThemes->where('name', 'like', '%' . $search . '%');
        }

        $templateThemes = $templateThemes->get();

        $uniqueThemes = TemplateTheme::active()
            ->distinct()
            ->pluck('name', 'slug')
            ->toArray();
  
        return compact('templateThemes', 'uniqueThemes', 'theme', 'themeData', 'tenantTheme');
    }

    public function getInnerData($slug = null, ThemeManager $themeManager): array
    {
        if (!$slug) {
            return ['view' => 'client.errors.404'];
        }

        $templateThemeInner = TemplateTheme::where('slug', $slug)
            ->active()
            ->first();

        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        return compact(
            'templateThemeInner', 
            'theme', 
            'themeData',
            'tenantTheme'
        );
    }
}
