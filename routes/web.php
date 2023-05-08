<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authenticade', [UserController::class, 'authenticade'])->name('user.authenticade');
Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/cadastro', 'create')->name('user.create');
    Route::post('/cadastro', 'store')->name('user.store');
});



Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::get('/index',[PostsController::class, 'index'])->name('index');
    Route::controller(PostsController::class)->prefix('index')->group(function () {
        Route::get('/cadastro', 'cadastro');
        Route::post('/cadastro', 'store');
    });

});

