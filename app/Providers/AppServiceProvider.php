<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('theme.ace.aside', function ($view) {
            $menus=Menu::getMenu();
            $view->with('menusComposer',$menus);
        });
        View::share('theme', 'ace');    }
}
