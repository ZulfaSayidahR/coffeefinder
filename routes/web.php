<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoffeeShopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD
|--------------------------------------------------------------------------
| HARUS DI LUAR AUTH
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('forgot.password');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password.post');

Route::get('/reset-password/{id}', [AuthController::class, 'showResetPassword'])
    ->name('reset.password');

Route::post('/reset-password/{id}', [AuthController::class, 'resetPassword'])
    ->name('reset.password.post');


/*
|--------------------------------------------------------------------------
| USER (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HOME USER
    |--------------------------------------------------------------------------
    */

    Route::get('/home', [CoffeeShopController::class, 'userIndex'])
        ->name('home');


    /*
    |--------------------------------------------------------------------------
    | DETAIL COFFEE
    |--------------------------------------------------------------------------
    */

    Route::get('/coffee/{id}', [CoffeeShopController::class, 'show'])
        ->name('user.detail');


    /*
    |--------------------------------------------------------------------------
    | REVIEW USER
    |--------------------------------------------------------------------------
    */

    Route::post('/coffee/review/{id}', [ReviewController::class, 'store'])
        ->name('review.store');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | COFFEE SHOP CRUD
    |--------------------------------------------------------------------------
    */

    Route::get('/coffee', [CoffeeShopController::class, 'index'])
        ->name('coffee.index');

    Route::get('/coffee/create', [CoffeeShopController::class, 'create'])
        ->name('coffee.create');

    Route::post('/coffee/store', [CoffeeShopController::class, 'store'])
        ->name('coffee.store');

    Route::get('/coffee/edit/{id}', [CoffeeShopController::class, 'edit'])
        ->name('coffee.edit');

    Route::post('/coffee/update/{id}', [CoffeeShopController::class, 'update'])
        ->name('coffee.update');

    Route::get('/coffee/delete/{id}', [CoffeeShopController::class, 'destroy'])
        ->name('coffee.delete');


    /*
    |--------------------------------------------------------------------------
    | REVIEW ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/reviews', [ReviewController::class, 'adminIndex'])
        ->name('admin.review.index');

    Route::get('/review/delete/{id}', [ReviewController::class, 'destroy'])
        ->name('admin.review.delete');


    /*
    |--------------------------------------------------------------------------
    | USER ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])
        ->name('admin.user.delete');
});