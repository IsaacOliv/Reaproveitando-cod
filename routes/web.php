<?php


use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRolesController;
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
        Route::get('/edit/{id}', 'edit')->name('roles.edit');
        Route::put('/edit/{id}', 'update')->name('roles.update');
    });
    
    Route::get('/index/roles/add', [UserRolesController::class, 'add'])->name('roles.add');
    Route::post('/index/roles/add', [UserRolesController::class, 'userRole'])->name('user.role');
});

