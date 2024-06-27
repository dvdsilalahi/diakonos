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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_code', length:16)->nullable();
            $table->string('uuid')->default("");
            $table->string('first_name', length:50)->nullable();
            $table->string('last_name', length:50)->nullable();
            $table->string('email', length:100)->nullable();
            $table->string('phone_number', length:20)->nullable();
            $table->string('place_of_birth', length:50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->text('country')->nullable();
            $table->text('province')->nullable();
            $table->text('municipality')->nullable();
            $table->text('district')->nullable();
            $table->text('village')->nullable();
            $table->text('hamlet')->nullable();
            $table->text('neighbourhood')->nullable();
            $table->string('nin', length:20)->nullable();
            $table->string('ssn', length:20)->nullable();
            $table->string('fr_no', length:20)->nullable();
            $table->string('gender', length:10)->nullable();
            $table->string('blood_type', length:5)->nullable();
            $table->string('fam_relation', length:15)->nullable();
            $table->string('education', length:50)->nullable();
            $table->string('profession', length:50)->nullable();
            $table->string('citizenship', length:50)->nullable();
            $table->string('father_name', length:50)->nullable();
            $table->string('mother_name', length:50)->nullable();
            $table->string('pic', length:150)->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('reason_for_joining', length:50)->nullable();
            $table->string('previous_beliefs', length:50)->nullable();
            $table->string('previous_church', length:50)->nullable();
            $table->json('ministries')->nullable();
            $table->json('spiritual_gifts')->nullable();
            $table->json('communities')->nullable();
            $table->json('personality_types')->nullable();
            $table->json('skills_talents')->nullable();
            $table->json('hobbies_activities')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
