<?php

use App\Http\Controllers\BobotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JurusanSmartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SmartController;
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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'home')->middleware('auth');
});
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index');
    Route::post('/login', 'auth')->name('login');
});
Route::resource('/siswa', SiswaController::class)->middleware('auth');
Route::resource('/jurusan', JurusanController::class)->middleware('auth');
Route::get('/jurusan/{jurusan:id}/smart', JurusanSmartController::class)->middleware('auth');
Route::resource('/siswa/{siswa:id}/nilai', NilaiController::class)->middleware('auth');
Route::resource('/bobot', BobotController::class)->middleware('auth');
Route::get('/smart', SmartController::class)->middleware('auth');
Route::resource('/admin', UserController::class);
Route::post('/logout', LogoutController::class)->name('logout');