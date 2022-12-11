<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokerController;
use App\Http\Controllers\PokerRequestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoRequestController;

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
Route::get('/find-game', [PokerRequestController::class,'join'])->name('find-game');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::resource('posts', PostController::class)->except(['index'])->middleware('auth');
Route::resource('poker', PokerController::class)->middleware('auth');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/todo-send', [ToDoRequestController::class, 'index'])->name('todo-list');
Route::resource('todo', ToDoRequestController::class);
Route::get('poker-request', [PokerRequestController::class, 'index'])->name('create-new-game')->middleware('auth');
Route::get('poker-join', [PokerRequestController::class, 'join'])->name('join-poker-game')->middleware('auth');
Route::post('poker-request', [PokerRequestController::class,'startNewGame'])->name('start-new-game')->middleware('auth');
Route::post('poker-join-request', [PokerRequestController::class,'joinGame'])->name('join-game')->middleware('auth');
Route::post('poker-players-request', [PokerRequestController::class,'getGameUsers'])->name('get-poker-game-users')->middleware('auth');
