<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/home', [HomeController::class, 'home'])->name('home');

//Route::resource('post', PostController::class)->except(
//    ['index']
//);

Route::name('posts.')->prefix('posts')->group(static function(){
    Route::get('/create', static function(){
        return view('posts.create');
    })->name('create');


    Route::post('/', static function (Request $request) {
        $request->validate(
            [
                'title' => 'required',
                'description' => ['required', 'min:10']
            ]
        );
        return redirect()
            ->route('posts.create')
            ->with('success', 'post is submitted! Title: '
                .$request->input('title').' Description: '
                .$request->input('description'));
    })->name('store');
});
