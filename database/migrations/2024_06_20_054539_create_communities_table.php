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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default("");
            $table->string('category', length:50)->nullable();
            $table->string('segment', length:50)->nullable();
            $table->string('area', length:100)->nullable();
            $table->json('leaders')->nullable();
            $table->string('address', length:200)->nullable();
            $table->string('gmap_link', length:100)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
