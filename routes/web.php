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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\AuthPageController::class, 'index'])->name('login');
Route::get('/home', [App\Http\Controllers\HomePageController::class, 'index'])->name('home');
Route::get('/partners', [App\Http\Controllers\PartnersPageController::class, 'index'])->name('partners');
Route::get('/statics', [App\Http\Controllers\StaticsPageController::class, 'index'])->name('statics');
Route::get('/withdrawal', [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name('withdrawal');


Route::get('/vue', function () {
    return view('vue');
});