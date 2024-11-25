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
        Schema::create('md_event_templates', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default("");
            $table->foreignId('event_category')->references('id')->on('md_event_categories')->onDelete('cascade');;
            $table->json('minister_duties')->nullable();
            $table->json('community_duties')->nullable();
            $table->json('segment_attendances')->nullable();
            $table->json('offering_accounts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_event_templates');
    }
};
