<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashCategoryController;
use App\Http\Controllers\CashMovController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cashcategories', CashCategoryController::class)->middleware('auth');
Route::get('cashcategories/delete/{id}', [CashCategoryController::class, 'delete'])->name('catdelete')->middleware('auth');
Route::get('cashmovs/delete/{id}', [CashMovController::class, 'delete'])->name('movdelete')->middleware('auth');

Route::resource('cashmovs', CashMovController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
