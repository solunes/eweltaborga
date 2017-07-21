<?php

namespace App\Providers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Solunes\Master\App\Providers\ComposerServiceProvider as ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot(ViewFactory $view)
    {
        view()->composer(['layouts.master', 'master::layouts.admin'], function ($view) {
            $array['footer_name'] = \FuncNode::check_var('footer_name');
            $array['footer_rights'] = \FuncNode::check_var('footer_rights');
            //$array['segment'] = request()->segment(1);
            $array['menus'] = \Solunes\Master\App\Menu::where('level',1)->where('menu_type','site')->get();
            $array['social'] = \App\SocialNetwork::get();
            $view->with($array);
        });
        parent::boot($view);
    }

    public function register()
    {
        //
    }

}