<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\SeoGoogle;
use App\Models\TemplateTheme;
use App\Modules\Client\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Data\EloquentClientRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientRepositoryInterface::class, EloquentClientRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     Carbon::setLocale('pt_BR');

    //     View::composer('client.themes.*.*.core.*', function ($view) {
    //         $view->with('seoGoogle', SeoGoogle::first());
    //     });
    // }

    public function boot(): void
    {
        Carbon::setLocale('pt_BR');

        View::composer('client.themes.*.*.core.*', function ($view) {
            $blogInner = null;

            if (request()->routeIs('blog')) {
                $blogInner = Blog::with('category')
                    ->where('slug', request()->route('slug'))
                    ->first();
            }
            $templateThemeInner = TemplateTheme::where('slug', request()->route('slug'))
            ->when(request()->route('templateVariation'), fn ($query) => $query->where('template_variation', request()->route('templateVariation')))
            ->active()
            ->first();

            $view->with([
                'seoGoogle' => SeoGoogle::first(),
                'blogInner' => $blogInner,
                'templateThemeInner' => $templateThemeInner,
            ]);
        });
    }
}
