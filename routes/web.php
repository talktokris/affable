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

//Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\AuthPageController::class, 'index'])->name('user-login');
//Route::get('/en/{upline}', [App\Http\Controllers\AuthPageController::class, 'register'])->name('user-register');
Route::match(array('GET','POST'),'/en/{reff_id}', [App\Http\Controllers\AuthPageController::class, 'register'])->name('user-register');

Route::post('/viewing', [App\Http\Controllers\AuthPageController::class, 'viewing'])->name('viewing');


Route::get('/home', [App\Http\Controllers\HomePageController::class, 'index'])->name('home');
Route::get('/partners', [App\Http\Controllers\PartnersPageController::class, 'index'])->name('partners');
Route::get('/statics', [App\Http\Controllers\StaticsPageController::class, 'index'])->name('statics');
Route::get('/withdrawal', [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name('withdrawal');
Route::get('/log-out', [App\Http\Controllers\authCheckController::class, 'logoutSession'])->name('logoutSession');



Route::group(['middleware' => ['auth']], function () {

   // Route::match(array('GET','POST'),'/admin/create-news-post', [App\Http\Controllers\Admin\AdminNewsController::class, 'createNewsPost'])->name('create-new-post');

  
   Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::get('/admin/user/view/{id}', [App\Http\Controllers\HomeController::class, 'tree'])->name('treeview');

Route::get('/admin/home2', [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name('withdrawal');

});

Route::get('/vue', function () {
    return view('vue');
});