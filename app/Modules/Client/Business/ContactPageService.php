<?php

namespace App\Modules\Client\Business;

use App\Models\Contact;
use App\Services\ThemeManager;

class ContactPageService
{
    public function getPageData(ThemeManager $themeManager): array
    {
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        
        return [
            'contact' => Contact::first(),
            'theme' => $theme,
            'themeData' => $themeData,
        ];
    }
}
