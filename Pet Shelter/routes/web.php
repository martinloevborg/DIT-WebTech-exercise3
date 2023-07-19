<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\HomeController;
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


/*
|-----------------------------------------------------------------------
| Task 1 Authorization. 
| You can modify the accessibility of your routes for different users here
|-----------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [HomeController::class, 'login'])->name('login');#->middleware('guest')
Route::post('login', [HomeController::class, 'doLogin'])->name('doLogin');#->middleware('guest');
Route::get('register', [HomeController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [HomeController::class, 'doRegister'])->name('doRegister')->middleware('guest');
Route::get('logout', [HomeController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'adoptions', 'as' => 'adoptions.'], function ()
{
    Route::get('create', [AdoptionController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/', [AdoptionController::class, 'store'])->name('store')->middleware('auth');
    Route::get('mine', [AdoptionController::class, 'mine'])->name('mine')->middleware('auth');
    Route::get('{adoption}', [AdoptionController::class, 'show'])->name('show');
    Route::post('{adoption}/adopt', [AdoptionController::class, 'adopt'])->name('adopt')->middleware('auth');
    Route::delete('{adoption}/adopt', [AdoptionController::class, 'destroy'])->name('destroy')->middleware('auth');
});
