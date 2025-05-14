<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('logins');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // admin
    Route::group(['middleware' => 'checkRole:0'], function () {

        // user
        Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
        Route::get('/admin/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
        Route::post('/admin/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/admin/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/admin/user/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::get('/admin/user/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('admin/user/bulkDelete/{ids}', [App\Http\Controllers\Admin\UserController::class, 'bulkDelete'])->name('admin.user.bulkDelete');
        Route::post('/admin/user/{id}/toggle-status', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('admin.user.toggleStatus');
    });

    // user
    Route::group(['middleware' => 'checkRole:1'], function () {
        // profile
        Route::match(['get', 'post'], '/user/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('user.profile');

        // blog
        Route::get('/user/blog', [App\Http\Controllers\User\BlogController::class, 'index'])->name('user.blog');
        Route::get('/user/blog/create', [App\Http\Controllers\User\BlogController::class, 'create'])->name('user.blog.create');
        Route::post('/user/blog/store', [App\Http\Controllers\User\BlogController::class, 'store'])->name('user.blog.store');
        Route::get('/user/blog/{id}/edit', [App\Http\Controllers\User\BlogController::class, 'edit'])->name('user.blog.edit');
        Route::post('/user/blog/{id}/update', [App\Http\Controllers\User\BlogController::class, 'update'])->name('user.blog.update');
        Route::get('/user/blog/{id}/delete', [App\Http\Controllers\User\BlogController::class, 'delete'])->name('user.blog.delete');
        Route::get('user/blog/bulkDelete/{ids}', [App\Http\Controllers\User\BlogController::class, 'bulkDelete'])->name('user.blog.bulkDelete');

    });



});
