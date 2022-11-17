<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function home() {
        return view('home');
    }

    public static function about(){
        return view('about');
    }
}
