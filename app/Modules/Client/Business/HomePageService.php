<?php

namespace App\Modules\Client\Business;

use App\Models\About;
use App\Models\Announcement;
use App\Models\BenefitTopic;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Depoiment;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Letsgo;
use App\Models\PopUp;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SessaoFaq;
use App\Models\Slide;
use App\Models\Statute;
use App\Models\Topic;
use App\Models\Video;
use App\Services\ThemeManager;
use App\Models\Tenant;

class HomePageService
{
    public function getIndexData(ThemeManager $themeManager): array
    {
        $blogSuperHighlights = Blog::whereHas('category', function ($active) {
            $active->where('active', 1);
        })->superHighlightOnly()->active()->sorting()->limit(6)->get();

        $blogHighlights = Blog::whereHas('category', function ($active) {
            $active->where('active', 1);
        })->highlightOnly()->active()->sorting()->limit(4)->get();

        $announcements = Announcement::select(
            'exhibition',
            'link',
            'path_image',
            'active',
            'sorting',
        )
            ->where('exhibition', '=', 'mobile')
            ->orWhere('exhibition', '=', 'horizontal')
            ->active()
            ->sorting()
            ->get();

        $slides = Slide::active()->sorting()->get();
        $topics = Topic::active()->sorting()->get();
        $about = About::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
        $videos = Video::active()->sorting()->get();
        $letsgo = Letsgo::active()->first();
        $depoiments = Depoiment::active()->sorting()->get();
        $contact = Contact::first();
        $statute = Statute::active()->first();
        $faqs = Faq::active()->sorting()->get();
        $sessaoFaq = SessaoFaq::active()->first();

        $productCategorieHighlights = ProductCategory::whereHas('products', function ($query) {
            $query->active()->whereHas('brand', fn ($q) => $q->active());
        })
            ->where('highlight', 1)
            ->active()
            ->sorting()
            ->limit(3)
            ->get();

        $productCategories = ProductCategory::whereHas('products', function ($query) {
            $query->active()->whereHas('brand', fn ($q) => $q->active());
        })
            ->active()
            ->sorting()
            ->limit(4)
            ->get();

        $products = Product::whereHas('category', function ($query) {
            $query->active();
        })
            ->whereHas('brand', function ($query) {
                $query->active();
            })->active()->sorting()->limit(16)->get();

        $recentCategories = BlogCategory::whereHas('blogs', function ($query) {
            $query->active()->whereHas('category', function ($active) {
                $active->where('active', 1);
            });
        })
            ->withCount(['blogs' => function ($query) {
                $query->active();
            }])
            ->where('active', 1)
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();

        $latestNews = Blog::whereHas('category', function ($active) {
            $active->where('active', 1);
        })
            ->with(['category' => function ($query) {
                $query->select('id', 'title', 'slug');
            }])
            ->orderBy('created_at', 'DESC')
            ->active()
            ->limit(10)
            ->get();

        $excludedIds = $recentCategories->pluck('id');

        $blogRelacionados = Blog::whereHas('category')
            ->whereNotIn('blog_category_id', $excludedIds)
            ->active()
            ->sorting()
            ->take(10)
            ->get();

        $announcementVerticals = Announcement::select(
            'exhibition',
            'link',
            'exhibition',
            'path_image',
            'active',
            'sorting',
        )
            ->where('exhibition', '=', 'vertical')
            ->active()
            ->sorting()
            ->get();

        $blogCategories = BlogCategory::whereHas('blogs')->active()->sorting()->get();

        $blogNoBairros = Blog::whereHas('category', function ($query) {
            $query->where('id', 1)
                ->where('active', 1);
        })
            ->with(['category' => function ($query) {
                $query->select('id', 'title', 'slug');
            }])
            ->orderBy('created_at', 'DESC')
            ->active()
            ->limit(10)
            ->get();

        $events = Event::active()
            ->whereMonth('date', now()->month)
            ->orderBy('date', 'asc')
            ->get();

        $popUp = PopUp::active()->first();

        $tenantTheme = Tenant::current();
        $theme = $themeManager;
        $themeData = $themeManager->theme();

        return compact(
            'sessaoFaq',
            'faqs',
            'depoiments',
            'latestNews',
            'recentCategories',
            'contact',
            'videos',
            'about',
            'blogSuperHighlights',
            'blogHighlights',
            'announcements',
            'blogRelacionados',
            'announcementVerticals',
            'blogCategories',
            'benefitTopics',
            'events',
            'popUp',
            'slides',
            'topics',
            'statute',
            'letsgo',
            'productCategorieHighlights',
            'productCategories',
            'products',
            'theme',
            'themeData',
            'tenantTheme',
            'blogNoBairros'
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
