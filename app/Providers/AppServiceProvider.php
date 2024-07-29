<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Menu;
use App\Models\Question;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.default');

        $underSidebarMenuBanners = Banner::underSidebarMenu()->get();
        $underQuestionBanners = Banner::underQuestion()->get();
        $bottomBanners = Banner::bottom()->get();
        $aboveFooterBanner = Banner::aboveFooter()->latest()->first();

        $topLeftMenus = Menu::query()->ofType('TOP_LEFT')->with('childrenRecursive')->whereNull('parent_id')->orderBy('order')->get();
        $topRightMenus = Menu::query()->ofType('TOP_RIGHT')->with('childrenRecursive')->whereNull('parent_id')->orderBy('order')->get();
        $bottomLeftMenus = Menu::query()->ofType('BOTTOM_LEFT')->with('childrenRecursive')->whereNull('parent_id')->orderBy('order')->get();
        $bottomRightMenus = Menu::query()->ofType('BOTTOM_RIGHT')->with('childrenRecursive')->whereNull('parent_id')->orderBy('order')->get();
        $sidebarMenus = Menu::query()->ofType('SIDEBAR')->with('childrenRecursive')->whereNull('parent_id')->orderBy('order')->get();

        $sidebarQuestions = Question::published()->orderBy('created_at', 'desc')->take(3)->get();
        $contactsSocialLinks = Contact::where('type', 0)->get();
        $contactsAboutLinks = Contact::where('type', 1)->get();
        $information = Information::query()->first();

        View::share(compact('information', 'topLeftMenus', 'topRightMenus', 'bottomLeftMenus', 'bottomRightMenus', 'sidebarMenus', 'contactsSocialLinks', 'contactsAboutLinks', 'underSidebarMenuBanners', 'underQuestionBanners', 'bottomBanners', 'aboveFooterBanner', 'sidebarQuestions'));
    }
}
