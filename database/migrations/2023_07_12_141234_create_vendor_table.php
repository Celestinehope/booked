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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendoraccepted_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('vendoraccepted_name');
            $table->string('vendoraccepted_address');
            $table->string('vendoraccepted_type');
            $table->string('vendoraccepted_contact');
            $table->string('vendoraccepted_certification');
            $table->string('vendoraccepted_image');
            $table->string('vendoraccepted_description');

            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
