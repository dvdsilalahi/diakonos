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
        Schema::create('md_coas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('number', length:50)->nullable();
            $table->string('account_name', length:256)->nullable();
            $table->string('account_type', length:256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_c_o_a_s');
    }
};
