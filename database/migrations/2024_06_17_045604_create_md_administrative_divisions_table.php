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
        Schema::create('md_administrative_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default("");
            $table->string('village', length:100)->nullable();
            $table->string('district', length:100)->nullable();
            $table->string('municipality', length:100)->nullable();
            $table->string('province', length:100)->nullable();
            $table->string('country', length:100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_administrative_divisions');
    }
};
