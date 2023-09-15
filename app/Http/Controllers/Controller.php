<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        // view()->share('menu', 'Menu-2');
        view()->composer('admin/*', function ($view){
            $view->with('menu', 'Menu admin share');
        });
        view()->composer('web/*', function ($view){
            $view->with('menu', 'Menu web Share');
        });
    }
}
