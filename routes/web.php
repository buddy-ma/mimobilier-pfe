<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AnnonceController;
use App\Http\Controllers\Admin\LocateurController;
use App\Http\Controllers\Admin\PaiementController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TypeAnnonceController;
use App\Http\Controllers\Admin\AnnonceController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\PaiementController;
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

Route::redirect('/admin', '/admin/dashboard');
Route::group(['prefix' => 'admin'], function () {
    //Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show-king-login');
    Route::post('/login', [LoginController::class, 'login'])->name('king-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('king-logout');
});

Route::redirect('/promoteur', '/promoteur/dashboard');
Route::group(['prefix' => 'promoteur'], function () {
    //Authentication
    Route::get('/login', [LoginController::class, 'showPromoteurLoginForm'])->name('show-promoteur-login');
    Route::post('/login', [LoginController::class, 'login'])->name('promoteur-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('promoteur-logout');
});

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

    // gestion  reservation 
    Route::get('/Reservation', [ReservationController::class, 'reservations'])->name('reservation-list');
    Route::get('/Reservation/add', [ReservationController::class, 'ShowAddReservation'])->name('show-reservation-add');
    Route::post('/Reservation/add', [ReservationController::class, 'reservationAdd'])->name('reservation-add');
    Route::get('/Reservation/{id?}', [ReservationController::class, 'reservationShow'])->name('reservation-show');
    Route::post('/Reservation/{id?}', [ReservationController::class, 'ReservationUpdate'])->name('reservation-update');
    Route::get('/deleteReservation/{id?}', [ReservationController::class, 'deletereservation'])->name('reservation-delete');

    // gestion  paiements 
    Route::get('/paiement', [PaiementController::class, 'paiements'])->name('paiement-list');
    Route::get('/paiement/add', [PaiementController::class, 'ShowAddpaiement'])->name('show-paiement-add');
    Route::post('/paiement/add', [PaiementController::class, 'paiementAdd'])->name('paiement-add');
    Route::get('/paiement/{id?}', [PaiementController::class, 'paiementShow'])->name('paiement-show');
    Route::post('/paiement/{id?}', [PaiementController::class, 'paiementUpdate'])->name('paiement-update');
    Route::get('/deletepaiement/{id?}', [PaiementController::class, 'deletepaiment'])->name('paiement-delete');

    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'list'])->name('blog-list');
        Route::get('/new', [BlogController::class, 'new'])->name('blog-new');
        Route::get('/decouvrez', [BlogController::class, 'decouvrez'])->name('blog-decouvrez');
        Route::get('/decouvrez/new', [BlogController::class, 'decouvrezNew'])->name('blog-decouvrez-new');
        Route::get('/add', [BlogController::class, 'add'])->name('show-blog-add');
        Route::post('/add', [BlogController::class, 'store'])->name('blog-add');
        Route::post('/add/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');

        Route::get('/update/{id?}', [BlogController::class, 'update'])->name('show-blog-update');
        Route::post('/{id?}', [BlogController::class, 'edit'])->name('blog-update');
        Route::delete('/delete/{id?}', [BlogController::class, 'delete'])->name('blog-delete');
        Route::delete('/restore/{id?}', [BlogController::class, 'restore'])->name('blog-restore');
        Route::get('/approve/{id?}', [BlogController::class, 'approve'])->name('show-blog-approve');
        Route::get('/changeStatus', [BlogController::class, 'changeStatus']);
        Route::get('/show/{id?}', [BlogController::class, 'show'])->name('show-blog-show');
    });


    Route::get('/locateurs', function () {
        return view('admin.mains-admin.locateurs.list');
    })->name('locateurs');

    Route::get('/villes', function () {
        return view('admin.mains-admin.villes');
    });
});

Route::group(['prefix' => 'promoteur'], function () {
    Route::get('/dashboard', [StatisticspromoController::class, 'Dashboard'])->name('promoteur-dashboard');
    //gestion annonces
    Route::get('/annonces', [AnnoncepromoController::class, 'annonces'])->name('annoncespromo-list');
    Route::get('/annonces/add', [AnnoncepromoController::class, 'ShowAddAnnonce'])->name('show-annoncepromo-add');
    Route::post('/annonces/add', [AnnoncepromoController::class, 'AnnonceAdd'])->name('annoncepromo-add');
    Route::get('/annonces/{id?}', [AnnoncepromoController::class, 'AnnonceShow'])->name('annoncepromo-show');
    Route::post('/annonces', [AnnoncepromoController::class, 'annonceUpdate'])->name('annoncepromo-update');
    Route::post('/annonceimages', [AnnoncepromoController::class, 'annonceImagesUpdate'])->name('annoncepromo-ImagesUpdate');
    Route::get('/annonces/delete/{id?}', [AnnoncepromoController::class, 'deleteannonce'])->name('annoncepromo-delete');
    Route::get('/annoncesimages/delete/{id?}', [AnnoncepromoController::class, 'deleteimages'])->name('imagespromo-delete');


    // gestion  paiements 
    Route::get('/paiement', [PaiementpromoController::class, 'paiements'])->name('paiementpromo-list');
    Route::get('/paiement/add', [PaiementpromoController::class, 'ShowAddpaiement'])->name('show-paiementpromo-add');
    Route::post('/paiement/add', [PaiementpromoController::class, 'paiementAdd'])->name('paiementpromo-add');
    Route::get('/paiement/{id?}', [PaiementpromoController::class, 'paiementShow'])->name('paiementpromo-show');
    Route::post('/paiement/{id?}', [PaiementpromoController::class, 'paiementUpdate'])->name('paiementpromo-update');
    Route::get('/deletepaiement/{id?}', [PaiementpromoController::class, 'deletepaiment'])->name('paiementpromo-delete');
});

Route::get('/', function () {
    return view('welcome');
});