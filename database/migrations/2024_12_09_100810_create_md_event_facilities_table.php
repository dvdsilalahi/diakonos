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
        Schema::create('md_event_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default("");
            $table->string('name', length:50)->nullable();
            $table->string('description', length:256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_event_facilities');
    }
};