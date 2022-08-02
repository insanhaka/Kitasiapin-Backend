<?php

use Illuminate\Support\Facades\Route;

// Front-End Route
use App\Http\Controllers\Front_HomeController;
use App\Http\Controllers\Front_AuthController;
use App\Http\Controllers\Front_DashboardController;

// Back-End Route
use App\Http\Controllers\Back_AuthController;
use App\Http\Controllers\Back_DashboardController;
use App\Http\Controllers\Back_UserController;
use App\Http\Controllers\Back_FeatureController;
use App\Http\Controllers\Back_InvitationThemeController;
use App\Http\Controllers\Back_ProfileController;

// Super Admin Route
use App\Http\Controllers\Super_DashboardController;
use App\Http\Controllers\Super_UserController;
use App\Http\Controllers\Super_RoleController;
use App\Http\Controllers\Super_MenuController;
use App\Http\Controllers\Super_PermissionController;
use App\Http\Controllers\Super_ApiheaderController;
use App\Http\Controllers\Super_BaseurlController;
use App\Http\Controllers\Super_BasicfeatureController;

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

// Front-end Route
Route::get('/', [Front_HomeController::class, 'index'])->name('home');
Route::get('/masuk', [Front_AuthController::class, 'index'])->name('masuk');
Route::post('/post-masuk', [Front_AuthController::class, 'store']);
Route::get('/logout/user', [Front_AuthController::class, 'logout']);

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

    Route::get('/dashboard', [Front_DashboardController::class, 'index'])->name('dashboard');

});

// Back-end Route
Route::get('/logout/admin', [Back_AuthController::class, 'logout']);
Route::get('/dapur', [Back_AuthController::class, 'index'])->name('dapur');
Route::post('/post-dapur', [Back_AuthController::class, 'store']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/dashboard', [Back_DashboardController::class, 'index'])->name('control');

    Route::resource('pengguna', Back_UserController::class);
    Route::get('/pengguna/{id}/delete', [Back_UserController::class, 'delete'])->name('pengguna.delete');
    Route::get('/pengguna/{id}/activation/{data}', [Back_UserController::class, 'activation'])->name('pengguna.activation');
    Route::get('/pengguna-serverside', [Back_UserController::class, 'serverside'])->name('pengguna.serverside');

    // Route::resource('paket', Back_PackageController::class);
    // Route::get('/paket/{id}/delete', [Back_PackageController::class, 'delete'])->name('paket.delete');
    // Route::get('/paket/{id}/view', [Back_PackageController::class, 'show'])->name('paket.view');
    // Route::post('/paket/{id}/fitur', [Back_PackageController::class, 'fitur'])->name('paket.fitur');
    // Route::get('/paket/{id}/activation/{data}', [Back_PackageController::class, 'activation'])->name('paket.activation');
    // Route::get('/paket-serverside', [Back_PackageController::class, 'serverside'])->name('paket.serverside');

    Route::resource('fitur', Back_FeatureController::class);
    Route::get('/fitur/{id}/delete', [Back_FeatureController::class, 'delete'])->name('fitur.delete');
    Route::get('/fitur-serverside', [Back_FeatureController::class, 'serverside'])->name('fitur.serverside');

    Route::resource('tema-undangan', Back_InvitationThemeController::class);
    Route::get('/tema-undangan/{id}/delete', [Back_InvitationThemeController::class, 'delete'])->name('tema-undangan.delete');
    Route::get('/tema-undangan/{id}/activation/{data}', [Back_InvitationThemeController::class, 'activation'])->name('tema-undangan.activation');
    Route::get('/tema-undangan-serverside', [Back_InvitationThemeController::class, 'serverside'])->name('tema-undangan.serverside');



});

// Profile route
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile/admin/{id}', [Back_ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/admin/{id}/edit', [Back_ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/admin/{id}/update', [Back_ProfileController::class, 'update']);
});

// Super Admin Route
Route::group(['prefix' => 'super', 'middleware' => 'auth'], function() {
    Route::get('/setting', [Super_DashboardController::class, 'index'])->name('setting');
    Route::get('/dashboard', [Super_DashboardController::class, 'dashboard'])->name('super-control');

    Route::get('/user', [Super_UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [Super_UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [Super_UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [Super_UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update', [Super_UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/delete', [Super_UserController::class, 'delete'])->name('user.delete');
    Route::get('/user/{id}/activation/{data}', [Super_UserController::class, 'activation'])->name('user.activation');
    Route::get('/user-serverside', [Super_UserController::class, 'serverside'])->name('user.serverside');

    Route::resource('menu', Super_MenuController::class);
    Route::get('/menu/{id}/delete', [Super_MenuController::class, 'delete'])->name('menu.delete');
    Route::get('/menu/{id}/activation/{data}', [Super_MenuController::class, 'activation'])->name('menu.activation');
    Route::get('/menu-serverside', [Super_MenuController::class, 'serverside'])->name('menu.serverside');

    Route::resource('role', Super_RoleController::class);
    Route::get('/role/{id}/delete', [Super_RoleController::class, 'delete'])->name('role.delete');
    Route::get('/role-serverside', [Super_RoleController::class, 'serverside'])->name('role.serverside');

    Route::resource('permission', Super_PermissionController::class);
    Route::get('/permission/{id}/delete', [Super_PermissionController::class, 'delete'])->name('permission.delete');
    // Route::get('/permission-serverside', [Super_RoleController::class, 'serverside'])->name('role.serverside');

    Route::resource('api-header', Super_ApiheaderController::class);
    Route::get('/api-header/{id}/delete', [Super_ApiheaderController::class, 'delete'])->name('api-header.delete');
    Route::get('/api-header/{id}/activation/{data}', [Super_ApiheaderController::class, 'activation'])->name('api-header.activation');
    Route::get('/api-header-serverside', [Super_ApiheaderController::class, 'serverside'])->name('api-header.serverside');

    Route::resource('base-url', Super_BaseurlController::class);
    Route::get('/base-url/{id}/delete', [Super_BaseurlController::class, 'delete'])->name('base-url.delete');
    Route::get('/base-url-serverside', [Super_BaseurlController::class, 'serverside'])->name('base-url.serverside');

    Route::resource('basic-feature', Super_BasicfeatureController::class);
    Route::get('/basic-feature/{id}/delete', [Super_BasicfeatureController::class, 'delete'])->name('basic-feature.delete');
    Route::get('/basic-feature/{id}/activation/{data}', [Super_BasicfeatureController::class, 'activation'])->name('basic-feature.activation');
    Route::get('/basic-feature-serverside', [Super_BasicfeatureController::class, 'serverside'])->name('basic-feature.serverside');

});

