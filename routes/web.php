<?php

// use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassController;
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

Route::post('/user/login', [AuthController::class, 'loginPost']);

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

Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::post('/admin/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/admin/book', [AdminController::class, 'book'])->name('admin.book')->middleware('auth');

Route::get('/admin/book/create', [BookController::class, 'create'])->name('book.create')->middleware('auth');

Route::post('/admin/book/store', [BookController::class, 'store'])->name('book.store')->middleware('auth');

Route::get('/admin/book/report/pdf', [BookController::class, 'pdf'])->name('admin.pdf')->middleware('auth');

Route::get('/admin/transaction', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('auth');

Route::get('/admin/transaction/add', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('auth');

Route::get('/admin/class', [AdminController::class, 'class'])->name('admin.class')->middleware('auth');

Route::get('/admin/class/create', [ClassController::class, 'create'])->name('class.create')->middleware('auth');

Route::post('/admin/class/store', [ClassController::class, 'store'])->name('class.store')->middleware('auth');

Route::get('/admin/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit')->middleware('auth');

Route::post('/admin/class/update', [ClassController::class, 'update'])->name('class.update')->middleware('auth');

Route::get('/admin/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete')->middleware('auth');

// Google Auth

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);

Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);