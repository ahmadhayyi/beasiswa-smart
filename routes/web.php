<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

Route::get('/home', DashboardController::class)->middleware('auth');
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index');
    Route::post('/login', 'auth')->name('login');
});
Route::resource('/siswa', SiswaController::class);
Route::resource('/siswa/{siswa:id}/nilai', NilaiController::class);
Route::resource('/mapel', MapelController::class);
Route::resource('/admin', UserController::class);
Route::post('/logout', LogoutController::class)->name('logout');
