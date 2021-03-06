<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api_AuthorizeController;
use App\Http\Controllers\Api_UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'checkHeader'], function() {

    // Api Authorization
    Route::post('/postlogin', [Api_AuthorizeController::class, 'postlogin'])->name('api.login');
    Route::post('/postsignup', [Api_AuthorizeController::class, 'postsignup'])->name('api.signup');
    Route::post('/googlesignup', [Api_AuthorizeController::class, 'googlesignup'])->name('google.login');

});

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/account-setting/{id}', [Api_UserController::class, 'getuser']);
    Route::post('/account-setting/{id}/update', [Api_UserController::class, 'updateuser']);

});
