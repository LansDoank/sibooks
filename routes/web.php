<?php

// use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class,'index'])->name('index');

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::post('/user/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// Book Routes

Route::get('/book/kelas', [BookController::class, 'kelas'])->name('book.kelas');

Route::get('/book/tampil', [BookController::class, 'index'])->name('book.index');

Route::get('/book/{book}', [BookController::class, 'show'])->name("book.show");

Route::get('/book/pinjam/{book}', [TransactionController::class, 'create'])->name('transaction.show');

Route::post('/book/pinjam', [TransactionController::class, 'store'])->name('transaction.post');

Route::get('/book/pengembalian/{book}', [TransactionController::class, 'edit'])->name('transaction.edit');

Route::post('/book/pengembalian', [TransactionController::class, 'update'])->name('transaction.update');

// User Routes

Route::get('/user/register', [UserController::class, 'register'])->name('register');

Route::post('/user/store', [UserController::class, 'registerPost']);

Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/api/kelas/{transaction_id}', [TransactionController::class, 'getTransaction'])->name('api.transaction');

// Admin Routes

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('isAdmin');

// Route::get('/admin/login', [AdminController::class, 'login'])->name('login');

// Route::post('/admin/login', [AdminController::class, 'loginPost']);

Route::get('/admin/school', [AdminController::class, 'school'])->name('admin.data')->middleware('isAdmin');

Route::post('/admin/school/update', [AdminController::class, 'schoolUpdate'])->name('admin.school.update')->middleware('isAdmin');

Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user')->middleware('isAdmin');

Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create')->middleware('isAdmin');

Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store')->middleware('isAdmin');

Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::post('/admin/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/admin/book', [AdminController::class, 'book'])->name('admin.book')->middleware('isAdmin');

Route::get('/admin/book/create', [BookController::class, 'create'])->name('book.create')->middleware('isAdmin');

Route::post('/admin/book/store', [BookController::class, 'store'])->name('book.store')->middleware('isAdmin');

Route::get('/admin/book/report/pdf', [BookController::class, 'pdf'])->name('admin.pdf')->middleware('isAdmin');

Route::get('/admin/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit')->middleware('isAdmin');

Route::post('/admin/book/update', [BookController::class, 'update'])->name('book.update')->middleware('isAdmin');

Route::get('/admin/book/delete/{id}', [BookController::class, 'destroy'])->name('book.delete')->middleware('isAdmin');

Route::get('/admin/transaction', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('isAdmin');

Route::get('/admin/transaction/add', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('isAdmin');

Route::get('/admin/class', [AdminController::class, 'class'])->name('admin.class')->middleware('isAdmin');

Route::get('/admin/class/create', [ClassController::class, 'create'])->name('class.create')->middleware('isAdmin');

Route::post('/admin/class/store', [ClassController::class, 'store'])->name('class.store')->middleware('isAdmin');

Route::get('/admin/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit')->middleware('isAdmin');

Route::post('/admin/class/update', [ClassController::class, 'update'])->name('class.update')->middleware('isAdmin');

Route::get('/admin/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete')->middleware('isAdmin');

// Google Auth

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);

Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);