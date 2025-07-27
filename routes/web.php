<?php

// use App\Http\Controllers\BookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Transaction;

Route::get('/', function () {   
    return view('index',[
        'kelasX' => Book::where('grade_id' ,'=',1)->paginate(4),
        'kelasXi' => Book::where('grade_id' ,'=',2)->paginate(4),
        'kelasXii' => Book::where('grade_id' ,'=',3)->paginate(4)
    ]);
})->name('index');

Route::get('/book/kelas',[BookController::class,'kelas'])->name('book.kelas');

Route::get('/book/tampil',[BookController::class,'index'])->name('book.index');

Route::get('/book/{book}',[BookController::class,'show'])->name("book.show");

Route::get('/book/pinjam/{book}',[TransactionController::class,'create'])->name('transaction.show');

Route::post('/book/pinjam',[TransactionController::class,'store'])->name('transaction.post');

Route::get('/book/pengembalian/{book}',[TransactionController::class,'edit'])->name('transaction.edit');


Route::post('/book/pengembalian',[TransactionController::class,'update'])->name('transaction.update');

Route::get('/user/login',[UserController::class,'login']);

Route::post('/user/login',[UserController::class,'loginPost']);

Route::get('/api/kelas/{transaction_id}',[TransactionController::class,'getTransaction'])->name('api.transaction');

