<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\sesiController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', [sesiController::class, 'index'])->name('login');
    Route::post('/', [sesiController::class, 'login']);
});

Route::get('/home',function(){
    return redirect('/admin');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [adminController::class, 'index'])->middleware('UserAkses:admin');
    Route::get('/user', [adminController::class, 'user'])->middleware('UserAkses:user');
    Route::get('/logout', [sesiController::class, 'logout']);
});

