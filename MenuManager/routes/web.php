<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
/**PAGES*/
Route::get('/admin/login', [PagesController::class, 'login_page'])->name('login');
Route::get('/admin/dashboard', [PagesController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin/pratos', [PagesController::class, 'dishes_page'])->name('dishes.page')->middleware('auth');


/**ACTIONS*/
Route::post('/admin/login_action', [AuthController::class, 'login'])->name('login.action');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');