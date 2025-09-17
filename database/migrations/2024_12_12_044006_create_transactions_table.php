<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('borrower_image');
            $table->string('kelas_peminjam');
            $table->foreignId('book_id')->constrained(
                table: 'books', indexName: 'transaction_book_id'
            );
            $table->integer('jumlah_buku');
            $table->date('borrow_time');
            $table->date('return_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
