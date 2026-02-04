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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rack_id')->nullable()->constrained(
                table: 'racks', indexName: 'rack_id'
            );
            $table->string('qr_code')->nullable();
            $table->string('download')->nullable();
            $table->string('image');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->integer('year');    
            $table->integer('stock');
            $table->foreignId('grade_id')->constrained(
                table: 'grades', indexName: 'book_grade_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
