<?php

// use App\Http\Controllers\BookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Transaction;

Route::get('/', [IndexController::class,'index'])->name('index');

Route::get('/book/kelas', [BookController::class, 'kelas'])->name('book.kelas');

Route::get('/book/tampil', [BookController::class, 'index'])->name('book.index');

Route::get('/book/{book}', [BookController::class, 'show'])->name("book.show");

Route::get('/book/pinjam/{book}', [TransactionController::class, 'create'])->name('transaction.show');

Route::post('/book/pinjam', [TransactionController::class, 'store'])->name('transaction.post');

Route::get('/book/pengembalian/{book}', [TransactionController::class, 'edit'])->name('transaction.edit');


Route::post('/book/pengembalian', [TransactionController::class, 'update'])->name('transaction.update');

Route::get('/user/login', [UserController::class, 'login'])->name('login');

Route::post('/user/login', [UserController::class, 'loginPost']);

Route::post('/user/logout',[UserController::class,'logout'])->name('logout');

Route::get('/user/register', [UserController::class, 'register'])->name('register');

Route::post('/user/store', [UserController::class, 'registerPost']);


Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/api/kelas/{transaction_id}', [TransactionController::class, 'getTransaction'])->name('api.transaction');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user')->middleware('auth');

Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');

Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');

Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/admin/book', [AdminController::class, 'book'])->name('admin.book')->middleware('auth');

Route::get('/admin/transaction', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('auth');