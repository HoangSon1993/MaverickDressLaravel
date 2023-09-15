<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $key = 'value1';
        $home = 'Home1';
        $menu = "Menu1";

        $data = [
            [
                'id' => 1,
                'image' => 'string',
                'title' => 'string title',
                'description' => 'text',
            ],
            [
                'id' => 2,
                'image' => 'string',
                'title' => 'string title',
                'description' => 'text',
            ],
            [
                'id' => 3,
                'image' => 'string',
                'title' => 'string title',
                'description' => 'text',
            ],
        ];
        // return view('admin.home.home',['key' => $key, 'home' => $home]);
        return view('admin.home.home',compact('key','home','data'));
        // return view('admin.home.home')->with('key', $key)->with('home',$home);

    }
    public function dashboard(){
        $menu = 'Menu2';
        return view('admin.home.dashboard');
    }
}
