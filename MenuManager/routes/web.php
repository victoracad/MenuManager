<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DishController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return redirect('/home/pt');
});
/**PAGES*/

/*CLIENTE PAGES*/
Route::get('/home/{locale}', [PagesController::class, 'home_page'])->name('home.page');
Route::get('/{cat}/{locale}', [PagesController::class, 'cat_page'])->name('cat.page');
Route::get('/pratos/{dish_id}/{locale}', [PagesController::class, 'dish_page_client'])->name('dishClient.page');
Route::get('/info/about/{locale}', [PagesController::class, 'about_page'])->name('about.page');


/*ADMIN PAGES*/
Route::get('/admin/login/{locale?}', [PagesController::class, 'login_page'])->name('login');
Route::get('/admin/dashboard/{locale}', [PagesController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin/pratos/{locale}', [PagesController::class, 'dishes_page'])->name('dishes.page')->middleware('auth');
Route::get('/admin/criarPrato/{locale}', [PagesController::class, 'createDish_page'])->name('createDish.page')->middleware('auth');
Route::get('/admin/category/{cat}/{locale}', [PagesController::class, 'category_page'])->name('category.page')->middleware('auth');
Route::get('/admin/editarPrato/{dish_id}/{locale}', [PagesController::class, 'editDish_page'])->name('editDish.page')->middleware('auth');
Route::get('/admin/prato/{dish_id}/{locale}', [PagesController::class, 'dish_page'])->name('dish.page')->middleware('auth');
Route::get('/admin/users/{locale}', [PagesController::class, 'users_page'])->name('users.page')->middleware('auth');
Route::get('/admin/createuser/{locale}', [PagesController::class, 'createuser_page'])->name('createuser.page')->middleware('auth');
Route::get('/admin/status/{locale}', [PagesController::class, 'status_page'])->name('status.page')->middleware('auth');
Route::get('/admin/statsSystem/{locale}', [PagesController::class, 'statsSystem_page'])->name('statsSystem.page')->middleware('auth');
Route::get('/admin/about/{locale}', [PagesController::class, 'admin_about_page'])->name('admin.about.page')->middleware('auth');
Route::get('/admin/test/{locale}', [DishController::class, 'test'])->name('test')->middleware('auth');


/**ACTIONS*/
Route::post('/admin/login_action/{locale}', [AuthController::class, 'login'])->name('login.action');
Route::post('/admin/logout/{locale}', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/admin/createDish_action/{locale}', [DishController::class, 'createDish'])->name('createDish.action')->middleware('auth');
Route::post('/admin/editDish_action/{dish_id}/{locale}', [DishController::class, 'updateDish'])->name('updateDish.action')->middleware('auth');
Route::post('/admin/createUser_action/{locale}', [AuthController::class, 'createUser'])->name('createUser.action');//->middleware('auth');
Route::post('/admin/deleteUser/{user_id}/{locale}', [AuthController::class, 'deleteUser'])->name('deleteUser.action')->middleware('auth');
Route::post('/admin/deleteDish/{dish_id}/{locale}', [DishController::class, 'deleteDish'])->name('deleteDish.action')->middleware('auth');
Route::post('/admin/updateAbout/{locale}', [DishController::class, 'updateAbout'])->name('updateAbout.action')->middleware('auth');
Route::get('/admin/changeDishStatus/{dish_id}', [DishController::class, 'changeStatusDish'])->name('changeStatusDish.action')->middleware('auth');
