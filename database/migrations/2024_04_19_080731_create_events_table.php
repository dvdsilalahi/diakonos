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
            $table->foreignId('category_id');
            $table->foreignId('community_id');
            $table->string('title', length:50)->nullable();
            $table->string('flyer', length:50)->nullable();
            $table->date('date');
            $table->time("begin");
            $table->json('duties_officers')->nullable();
            $table->json('contact_officers')->nullable();
            $table->decimal('budget',9,3);
            $table->decimal('offerings',9,3);
            $table->integer('male_attendees')->nullable();
            $table->integer('female_attendees')->nullable();
            $table->integer('child_attendees')->nullable();
            $table->json('attendee_names')->nullable();
            $table->text('evaluation');
            $table->boolean('displayed')->default(false)->change();
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
