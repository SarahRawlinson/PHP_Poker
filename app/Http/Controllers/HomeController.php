<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Post;

class HomeController extends Controller
{
    public static function home(): Factory|View|Application
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    /**
     * @return Factory|View|Application
     */
    public static function about(): Factory|View|Application
    {
        return view('about');
    }


}
