<?php

namespace App\Modules\Client\Business;

use App\Models\About;
use App\Models\Advantage;
use App\Models\Announcement;
use App\Models\BenefitTopic;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Depoiment;
use App\Models\Direction;
use App\Models\Event;
use App\Models\Faq;
use App\Models\ImpactSection;
use App\Models\Letsgo;
use App\Models\LineOfTime;
use App\Models\Partner;
use App\Models\Plan;
use App\Models\PlanNetwork;
use App\Models\PlanNetworkCategory;
use App\Models\PopUp;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\Report;
use App\Models\ServiceItem;
use App\Models\ServiceLocation;
use App\Models\ServiceSection;
use App\Models\SessaoFaq;
use App\Models\Slide;
use App\Models\Statute;
use App\Models\TemplateTheme;
use App\Models\Tenant;
use App\Models\Topic;
use App\Models\Video;
use App\Services\ThemeManager;

class HomePageService
{
    public function getIndexData(ThemeManager $themeManager): array
    {

        $slides = Slide::active()->sorting()->get();
        $topics = Topic::active()->sorting()->get();
        $abouts = About::active()->get();
        $videos = Video::active()->sorting()->get();
        $partners = Partner::active()->sorting()->get();
        $letsgo = Letsgo::active()->first();
        $depoiments = Depoiment::active()->sorting()->get();
        $contact = Contact::first();
        $statute = Statute::active()->first();
        $blogHighlights = Blog::with('category')->active()->highlightOnly()->limit(3)->get();
        $faqs = Faq::active()->sorting()->get();
        $sessaoFaq = SessaoFaq::active()->first();
        $services = ServiceItem::active()->get();
        $sections = ServiceSection::active()->whereIn('section', [
        'testimonial', 'service', 'gallery', 'planNetwork', 'product',
        'pilar', 'advantages_persona', 'advantages_enterprise', 'partners', 'banner_inner',])->get()->keyBy('section');
        $galleries = ProductGallery::get();
        $serviceLocation = ServiceLocation::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
        $planCategories = PlanNetworkCategory::with('plans')->whereHas('plans')->sorting()->active()->get();
        $plans = PlanNetwork::sorting()->active()->get();
        $productCategories = ProductCategory::whereHas('products', function ($query) {
            $query->active()->whereHas('brand', fn ($q) => $q->active());
        })
            ->active()
            ->sorting()
            ->limit(4)
            ->get();
        $products = Product::sorting()->active()->get();
        $reports = Report::active()->get();
        $contractedPlans = Plan::active()->get();
        $popUp = PopUp::active()->first();        
        $templateThemes = TemplateTheme::active()->get();
        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();
        $directions = Direction::active()->sorting()->get();
        $advantages = Advantage::active()
        ->sorting()
        ->get();
        $benefits = $advantages->groupBy('for_you');
        $benefitForPersonas = $benefits->get('persona', collect());
        $benefitForEnterprises = $benefits->get('enterprise', collect());
        $lineOfTimes = LineOfTime::active()->get();
        $impactSections = ImpactSection::with('metrics')->active()->get();

        return compact(
            'impactSections',
            'lineOfTimes',
            'benefitForPersonas',
            'benefitForEnterprises',
            'directions',
            'templateThemes',
            'advantages',
            'contractedPlans',
            'reports',
            'blogHighlights',
            'productCategories',
            'products',
            'serviceLocation',
            'sessaoFaq',
            'benefitTopics',
            'faqs',
            'depoiments',
            'partners',
            'contact',
            'videos',
            'abouts',         
            'popUp',
            'slides',
            'topics',
            'statute',
            'letsgo',
            'theme',
            'themeData',
            'tenantTheme',
            'services',
            'sections',
            'galleries',
            'planCategories',
            'plans',
        );
    }

    public function filterByCategory($categorySlug = null): array
    {
        $query = Blog::whereHas('category', function ($active) {
            $active->where('active', 1);
        })
            ->with(['category'])
            ->active()
            ->limit(10);

        if ($categorySlug && $categorySlug !== 'todas') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $allNews = $query->orderBy('created_at', 'DESC')->get();
        $latestNews = $allNews;

        return [
            'allNews' => $allNews,
            'latestNews' => $latestNews,
        ];
    }
}
