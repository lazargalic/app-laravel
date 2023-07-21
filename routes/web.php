<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LoggedIn;
use App\Http\Middleware\Admin;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//registracija
Route::post('/register', [\App\Http\Controllers\HomeController::class, 'store'])->name('register');
//logovanje
Route::post('/login', [\App\Http\Controllers\HomeController::class, 'login'])->name('login');
//logout
Route::get('/single/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('one');

Route::middleware([LoggedIn::class])->group(function () {
    Route::get('/token', [\App\Http\Controllers\TokenController::class, 'index'])->name('token');
    Route::get('/myFollows', [\App\Http\Controllers\MyFollowsController::class, 'index'])->name('myFollows');
    Route::get('/logout/{id?}', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::get('/streamerStart', [\App\Http\Controllers\StreamNowController::class, 'index'])->name('streamerStart');
    Route::post('/registerStreamer', [\App\Http\Controllers\StreamNowController::class, 'create'])->name('registerStreamer');
    Route::post('/startStream', [\App\Http\Controllers\StreamNowController::class, 'createnewstream'])->name('createnewstream');
    Route::post('/addtokens', [\App\Http\Controllers\TokenController::class, 'store'])->name('addtokens');
    Route::post('/single/vratiCenuTokena/{id}', [\App\Http\Controllers\OneLiveStreamController::class, 'price']);
    Route::post('/single/doniraj', [\App\Http\Controllers\OneLiveStreamController::class, 'donate']);
    Route::post('/single/follow', [\App\Http\Controllers\OneLiveStreamController::class, 'follow']);
    Route::delete('/myFollows/{iduser}/{idstreamer}', [\App\Http\Controllers\MyFollowsController::class, 'destroy'])->name('otprati');
    Route::post('/endlivestream/{id}', [\App\Http\Controllers\StreamNowController::class, 'endlivestream'])->name('endlivestream');

});

Route::middleware([Admin::class])->group(function () {
   Route::get('/admins', [\App\Http\Controllers\AdminController::class, 'index'])->name('admins');
   Route::get('/admins/activities', [\App\Http\Controllers\AdminController::class, 'activities'])->name('activities');
   Route::get('/admins/usersadmins', [\App\Http\Controllers\AdminController::class, 'usersadmins'])->name('usersadmins');
   Route::post('/admins/changerole', [\App\Http\Controllers\AdminController::class, 'changerole'])->name('changerole');
   Route::post('/admins/deleteuser', [\App\Http\Controllers\AdminController::class, 'deleteuser'])->name('deleteuser');
   Route::post('/admins/activities/filter', [\App\Http\Controllers\AdminController::class, 'activitiesFilter'])->name('activitiesFilter');
   Route::get('/admincategories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('admincategories');
   Route::delete('/admincategoriesdelete/{id}', [\App\Http\Controllers\AdminController::class, 'destroycat'])->name('admindeletecat');
   Route::post('/admincreatecat', [\App\Http\Controllers\AdminController::class, 'createcat'])->name('admincreatecat');
   Route::get('/admintokens', [\App\Http\Controllers\AdminController::class, 'admintokens'])->name('admintokens');
   Route::put('/convert_token/{id_user}/{tokens}/{id_bytk}', [\App\Http\Controllers\AdminController::class, 'convertToken'])->name('convert_token');
   Route::put('/refusetoken/{id_bytk}', [\App\Http\Controllers\AdminController::class, 'refusetoken'])->name('refusetoken');
});

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');




