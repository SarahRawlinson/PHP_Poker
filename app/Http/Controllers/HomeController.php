<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public static function home(): Factory|View|Application
    {
        return view('home');
    }

    /**
     * @return Factory|View|Application
     */
    public static function about(): Factory|View|Application
    {
        return view('about');
    }
}
