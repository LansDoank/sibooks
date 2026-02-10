<?php

// use App\Http\Controllers\BookController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('index')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/user/login', [AuthController::class, 'loginPost'])->name('login.post')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Book Routes

Route::middleware(['auth'])->prefix('book')->group(function () {
    Route::get('/kelas', [BookController::class, 'kelas'])->name('book.kelas');

    Route::get('/tampil', [BookController::class, 'index'])->name('book.index');

    Route::get('/{book}', [BookController::class, 'show'])->name("book.show");

    Route::get('/pinjam/{book}', [TransactionController::class, 'create'])->name('transaction.show');

    Route::post('/pinjam', [TransactionController::class, 'store'])->name('transaction.post');

    Route::get('/submit/{book}', [TransactionController::class, 'submit'])->name('transaction.submit');

    Route::get('/pengembalian/{slug}', [TransactionController::class, 'edit'])->name('transaction.edit');

    Route::post('/pengembalian', [TransactionController::class, 'update'])->name('transaction.update');

    Route::get('/verification/{slug}', [TransactionController::class, 'verification'])->name('transaction.verification');
});

// User Routes  

Route::prefix('user')->group(function() {

    Route::get('/register', [UserController::class, 'register'])->name('register');
    
    Route::post('/store', [UserController::class, 'registerPost']);
    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

// Route Api

Route::get('/api/kelas/{transaction_id}', [TransactionController::class, 'getTransaction'])->name('api.transaction');

Route::get('/api/transaction/monthly',[DashboardController::class,'getMonthly']);

Route::get('/api/book/status',[DashboardController::class,'getBookStatus']);

Route::get('/api/book/{slug}',[BookController::class,'getDetailBookApi'])->name('getDetailBookApi');

// Admin Routes

Route::middleware(['isAdmin'])->prefix('admin')->group(function () { 

    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('isAdmin');
    
    Route::get('/school', [AdminController::class, 'school'])->name('admin.data')->middleware('isAdmin');
    
    Route::post('/school/update', [AdminController::class, 'schoolUpdate'])->name('admin.school.update')->middleware('isAdmin');
    
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user')->middleware('isAdmin');
    
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('isAdmin');
    
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('isAdmin');
    
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    
    Route::get('/book', [AdminController::class, 'book'])->name('admin.book')->middleware('isAdmin');
    
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create')->middleware('isAdmin');
    
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store')->middleware('isAdmin');
    
    Route::get('/book/report/pdf', [BookController::class, 'pdf'])->name('admin.pdf')->middleware('isAdmin');
    
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit')->middleware('isAdmin');
    
    Route::post('/book/update', [BookController::class, 'update'])->name('book.update')->middleware('isAdmin');
    
    Route::get('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.delete')->middleware('isAdmin');

    Route::get('/book/verification/{id}', [TransactionController::class, 'vericationAdmin'])->name('book.verificationAdmin')->middleware('isAdmin');
    
    Route::get('/rack', [AdminController::class, 'rack'])->name('admin.rack')->middleware('isAdmin');

    Route::get('/rack/create',  [RackController::class, 'create'])->name('rack.create')->middleware('isAdmin');
    
    Route::post('/rack/store', [RackController::class, 'store'])->name('rack.store')->middleware('isAdmin');

    Route::get('/rack/edit/{id}', [RackController::class, 'edit'])->name('rack.edit')->middleware('isAdmin');

    Route::post('/rack/update', [RackController::class, 'update'])->name('rack.update')->middleware('isAdmin');

    Route::get('/rack/delete/{id}', [RackController::class, 'destroy'])->name('admin.rack.delete')->middleware('isAdmin');

    Route::get('/transaction', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('isAdmin');
    
    Route::get('/transaction/add', [AdminController::class, 'transaction'])->name('admin.transaction')->middleware('isAdmin');
    
    Route::get('/class', [AdminController::class, 'class'])->name('admin.class')->middleware('isAdmin');
    
    Route::get('/class/create', [ClassController::class, 'create'])->name('class.create')->middleware('isAdmin');
    
    Route::post('/class/store', [ClassController::class, 'store'])->name('class.store')->middleware('isAdmin');
    
    Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit')->middleware('isAdmin');
    
    Route::post('/class/update', [ClassController::class, 'update'])->name('class.update')->middleware('isAdmin');
    
    Route::get('/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete')->middleware('isAdmin');
});


// Google Auth

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);

Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);