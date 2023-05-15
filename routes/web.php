<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\StatisticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin'], function () {
    //Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show-king-login');
    Route::post('/login', [LoginController::class, 'login'])->name('king-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('king-logout');
});

Route::redirect('/admin', '/admin/dashboard');

//Admin Pages
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [StatisticsController::class, 'Dashboard'])->name('dashboard');

    //user
    Route::get('/user', [UserController::class, 'User'])->name('user-list');
    Route::get('/user/add', [UserController::class, 'ShowAddUser'])->name('show-user-add');
    Route::post('/user/add', [UserController::class, 'UserAdd'])->name('user-add');
    Route::get('/user/{id?}', [UserController::class, 'UserShow'])->name('user-show');
    Route::post('/user/{id?}', [UserController::class, 'UserUpdate'])->name('user-update');

    //role
    Route::get('/role', [UserController::class, 'Role'])->name('role-list');
    Route::get('/role/add', [UserController::class, 'ShowAddRole'])->name('show-role-add');
    Route::post('/role/add', [UserController::class, 'RoleAdd'])->name('role-add');
    Route::get('/role/{id?}', [UserController::class, 'RoleShow'])->name('role-show');
    Route::post('/role/{id?}', [UserController::class, 'RoleUpdate'])->name('role-update');

    //permission
    Route::get('/permission', [UserController::class, 'Permission'])->name('permission-list');
    Route::get('/permission/add', [UserController::class, 'ShowAddPermission'])->name('show-permission-add');
    Route::post('/permission/add', [UserController::class, 'PermissionAdd'])->name('permission-add');
    Route::get('/permission/{id?}', [UserController::class, 'PermissionShow'])->name('permission-show');
    Route::post('/permission/{id?}', [UserController::class, 'PermissionUpdate'])->name('permission-update');
});

Route::get('/', function () {
    return view('welcome');
});