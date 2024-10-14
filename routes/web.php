<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\sesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoanController;

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


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [BookController::class, 'index'])->name('Admin.books.index');
    Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/admin/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/admin/books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/admin/books/{id}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');
});

Route::get('/user', [BukuController::class, 'index'])->name('books.index');


Route::get('/books', [BukuController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BukuController::class, 'show'])->name('books.show');

Route::post('/books/{id}/borrow', [LoanController::class, 'borrow'])->name('books.borrow');
Route::post('/books/{id}/return', [LoanController::class, 'return'])->name('books.return');

