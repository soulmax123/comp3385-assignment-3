<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('/dashboard');
// Create additional Routes below

Route::get('/login') ->name('login') ->uses('App\Http\Controllers\AuthController@create');   
Route::post('/login') ->name('login.store') ->uses('App\Http\Controllers\AuthController@store');

Route::get('/community-events/add') ->name('community-events.create') ->uses('App\Http\Controllers\CommunityEventController@create');
Route::post('/community-events') ->name('community-events.store') ->uses('App\Http\Controllers\CommunityEventController@store');