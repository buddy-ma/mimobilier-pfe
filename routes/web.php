<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\LocateurController;
use App\Http\Controllers\Admin\TypeAnnonceController;
use App\Http\Controllers\Admin\AnnonceController;
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

    Route::get('/villes', function () {
        return view('admin.mains-admin.villes');
    });

//gestion annonces
    Route::get('/annonces', [AnnonceController::class, 'annonces'])->name('annonces-list');
    Route::get('/annonces/add', [AnnonceController::class, 'ShowAddAnnonce'])->name('show-annonce-add');
    Route::post('/annonces/add', [AnnonceController::class, 'AnnonceAdd'])->name('annonce-add');
    Route::get('/annonces/{id?}', [AnnonceController::class, 'AnnonceShow'])->name('annonce-show');
    Route::post('/annonces', [AnnonceController::class, 'annonceUpdate'])->name('annonce-update');
    Route::post('/annonceimages', [AnnonceController::class, 'annonceImagesUpdate'])->name('annonce-ImagesUpdate');
    Route::get('/annonces/delete/{id?}', [AnnonceController::class, 'deleteannonce'])->name('annonce-delete');
    Route::get('/annoncesimages/delete/{id?}', [AnnonceController::class, 'deleteimages'])->name('images-delete');
 
//gestion TypeAnnonce
    Route::get('/Typeannonce', [TypeAnnonceController::class, 'Typeannonce'])->name('typeannonce-list');
    Route::get('/Typeannonce/add', [TypeAnnonceController::class, 'ShowAddType'])->name('show-type-add');
    Route::post('/Typeannonce/add', [TypeAnnonceController::class, 'TypeAdd'])->name('type-add');
    Route::get('/Typeannonce/{id?}', [TypeAnnonceController::class, 'TypeShow'])->name('type-show');
    Route::post('/Typeannonce/{id?}', [TypeAnnonceController::class, 'TypeUpdate'])->name('type-update');
    Route::get('/deleteTypeannonce/{id?}', [TypeAnnonceController::class, 'deletetype'])->name('type-delete');
    Route::get('/locateurs', function () {
        return view('admin.mains-admin.locateurs.list');
    })->name('locateurs');
});

Route::get('/', function () {
    return view('welcome');
});