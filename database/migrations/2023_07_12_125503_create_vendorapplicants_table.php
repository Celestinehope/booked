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
        Schema::create('vendorapplicants', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->string('vendor_email');
            $table->string('vendor_password');
            $table->string('vendor_address');
            $table->string('vendor_type');
            $table->string('vendor_contact');
            $table->string('vendor_certification');
            $table->string('vendor_image');
            $table->string('vendor_description');

            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendorapplicants');
    }
};
