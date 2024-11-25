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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default("");
            $table->foreignId('category_id');
            $table->foreignId('community_id');
            $table->string('title', length:50)->nullable();
            $table->string('flyer', length:50)->nullable();
            $table->date('start_date')->nullable();
            $table->date("end_date")->nullable();
            $table->time('start_time')->nullable();
            $table->time("end_time")->nullable();
            $table->json('duties_officers')->nullable();
            $table->json('duties_teams')->nullable();
            $table->decimal('budget',9,3)->nullable();
            $table->decimal('offerings',9,3)->nullable();
            $table->json('attendees')->nullable();
            $table->json('attendee_names')->nullable();
            $table->text('evaluation')->nullable();
            $table->boolean('is_published')->default(false)->change();
            $table->boolean('is_active')->default(true)->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
