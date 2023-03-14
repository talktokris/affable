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
Route::match(array('GET','POST'),'withdrawal', [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name("withdrawal");
//Route::get('/withdrawal'. [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name('withdrawal')

Route::post('/withdrawal-ajex', [App\Http\Controllers\WithdrawalPageController::class, 'withdrawalAjex'])->name("withdrawal-ajex");


Route::get('/log-out', [App\Http\Controllers\authCheckController::class, 'logoutSession'])->name('logoutSession');


Route::get('/cron/payment', [App\Http\Controllers\paymentController::class, 'checkPayment'])->name('checkPayment');



Route::group(['middleware' => ['auth']], function () {

   // Route::match(array('GET','POST'),'/admin/create-news-post', [App\Http\Controllers\Admin\AdminNewsController::class, 'createNewsPost'])->name('create-new-post');

  
   Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-home');
   Route::get('/admin/user/view/{id}', [App\Http\Controllers\HomeController::class, 'tree'])->name('treeview');

Route::get('/admin/home2', [App\Http\Controllers\WithdrawalPageController::class, 'index'])->name('withdrawal-two');

});

Route::get('/vue', function () {
    return view('vue');
});






//Clear route cache
Route::get('/route-cache', function() {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
  });
  //Clear config cache
  Route::get('/config-cache', function() {
    \Artisan::call('config:cache');
    return 'Config cache cleared';
  }); 
  // Clear application cache
  Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
  });
  // Clear view cache
  Route::get('/view-clear', function() {
    \Artisan::call('view:clear');
    return 'View cache cleared';
  });
  // Clear cache using reoptimized class
  Route::get('/optimize-clear', function() {
    \Artisan::call('optimize:clear');
    return 'View cache cleared';
  });