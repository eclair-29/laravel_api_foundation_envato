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
        Schema::create('purchasers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // Individual or Business
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('zipcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasers');
    }
};
