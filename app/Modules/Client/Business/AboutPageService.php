<?php

namespace App\Modules\Client\Business;

use App\Models\About;
use App\Models\BenefitTopic;
use App\Models\Contact;
use App\Models\Direction;
use App\Models\Partner;
use App\Models\Report;
use App\Models\ServiceLocation;
use App\Models\Statute;
use App\Models\Topic;
use App\Models\Video;

class AboutPageService
{
    public function getPageData(): array
    {
        return [
            'about' => About::active()->first(),
            'topics' => Topic::active()->sorting()->get(),
            'benefitTopics' => BenefitTopic::active()->sorting()->get(),
            'partners' => Partner::active()->sorting()->get(),
            'contact' => Contact::first(),
            'statute' => Statute::active()->first(),
            'directions' => Direction::active()->sorting()->get(),
            'video' => Video::active()->first(),
            'reports' => Report::active()->get(),
            'serviceLocation' => ServiceLocation::active()->first(),
        ];
    }
}
