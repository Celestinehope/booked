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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id('orderdetails_id');
            $table->integer('orderdetails_quantity');
            $table->enum('orderdetails_type',['bought','borrowed'])->default('bought');
            $table->date('orderdetails_duration_start');
            $table->date('orderdetails_duration_end');
            $table->foreignId('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreignId('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
