<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboardPage'])->name('showDashboardPage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   
    Route::get('/show-create-form', [PostController::class, 'showPostForm'])->name('create'); 
    Route::post('/store-create-form', [PostController::class, 'storePost'])->name('store'); 
    Route::get('/{post}/edit-form', [PostController::class, 'showEditPostForm'])->name('edit'); 
    Route::put('/{post}/update-form', [PostController::class, 'updatePost'])->name('update'); 
    Route::delete('/{post}/delete', [PostController::class, 'deletePost'])->name('delete'); 

});
