<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('categories', 'App\Http\Controllers\CategoryController'::class);
Route::resource('locations', 'App\Http\Controllers\LocationController'::class);
Route::resource('members', 'App\Http\Controllers\MemberController'::class);
Route::resource('demandes', 'App\Http\Controllers\DemandeController'::class);
Route::resource('stats', 'App\Http\Controllers\StatController'::class);
Route::resource('events', 'App\Http\Controllers\EventController'::class);

