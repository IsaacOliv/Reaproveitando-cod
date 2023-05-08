<?php


use App\Http\Controllers\RolesController;
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
    
    Route::get('/index',[RolesController::class, 'index'])->name('index');

    Route::controller(RolesController::class)->prefix('index')->group(function () {
        Route::get('/create', 'create')->name('roles.create');
        Route::post('/create', 'store')->name('roles.store');
        Route::get('/roles', 'show')->name('roles.show');
        Route::delete('/roles/{id}', 'destroy')->name('roles.destroy');
        Route::PUT('/edit/{id}', 'edit')->name('roles.edit');
    });

});

