<?php

namespace App\Modules\Client\Business;

use App\Models\Contact;

class ContactPageService
{
    public function getPageData(): array
    {
        return [
            'contact' => Contact::first(),
        ];
    }
}
