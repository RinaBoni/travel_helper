<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ru_RU');
        Paginator::useBootstrapFour();
        FacadesView::share('categoriess', Category::all());
        FacadesView::share('districtss', Post::distinct()->pluck('district'));
    }
}
