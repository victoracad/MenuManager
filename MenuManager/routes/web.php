<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DishController;

Route::get('/', function () {
    return view('welcome');
});
/**PAGES*/
Route::get('/admin/login', [PagesController::class, 'login_page'])->name('login');
Route::get('/admin/dashboard', [PagesController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin/pratos', [PagesController::class, 'dishes_page'])->name('dishes.page')->middleware('auth');
Route::get('/admin/criarPrato', [PagesController::class, 'createDish_page'])->name('createDish.page')->middleware('auth');
Route::get('/admin/category/{cat}', [PagesController::class, 'category_page'])->name('category.page')->middleware('auth');
Route::get('/admin/editarPrato/{dish_id}', [PagesController::class, 'editDish_page'])->name('editDish.page')->middleware('auth');
Route::get('/admin/prato/{dish_id}', [PagesController::class, 'dish_page'])->name('dish.page')->middleware('auth');
Route::get('/admin/users', [PagesController::class, 'users_page'])->name('users.page')->middleware('auth');
Route::get('/admin/createuser', [PagesController::class, 'createuser_page'])->name('createuser.page')->middleware('auth');
Route::get('/admin/status', [PagesController::class, 'status_page'])->name('status.page')->middleware('auth');


/**ACTIONS*/
Route::post('/admin/login_action', [AuthController::class, 'login'])->name('login.action');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/admin/createDish_action', [DishController::class, 'createDish'])->name('createDish.action')->middleware('auth');
Route::post('/admin/editDish_action/{dish_id}', [DishController::class, 'updateDish'])->name('updateDish.action')->middleware('auth');
Route::post('/admin/createUser_action', [AuthController::class, 'createUser'])->name('createUser.action')->middleware('auth');
Route::post('/admin/deleteUser/{user_id}', [AuthController::class, 'deleteUser'])->name('deleteUser.action')->middleware('auth');