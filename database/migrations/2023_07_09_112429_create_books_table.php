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
            $table->id('book_id');
            $table->string('book_name');
            $table->string('book_description');
            $table->integer('book_quantity');
            $table->integer('book_price');
            $table->string('book_author');
            $table->foreignId('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreignId('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('book_image');
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