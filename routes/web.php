<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokerController;
use App\Http\Controllers\PokerRequestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

Route::resource('posts', PostController::class)->except(
    ['index']
)->middleware('auth');

Route::resource('poker', PokerController::class);

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/ajax-form', 'PokerController@ajax_form');
Route::get('/todo-send', [CrudController::class, 'index']);
Route::resource('todo', CrudController::class);
Route::resource('poker-request', PokerRequestController::class);
