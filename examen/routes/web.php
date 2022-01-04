<?php

use App\Http\Controllers\BestellingController;
use App\Http\Controllers\DrankController;
use App\Http\Controllers\GerechtenController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReseveringController;
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

Route::get('/', [ReseveringController::class, 'create']);

Auth::routes();

Route::resource('/reservering', ReseveringController::class)
    ->middleware('auth');
Route::resource('/bestelling', BestellingController::class)
    ->middleware('auth');
Route::resource('/menu', MenuController::class)
    ->middleware('auth');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
