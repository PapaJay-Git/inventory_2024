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
        Schema::create('kabataans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Basic Information
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('position')->nullable();
            $table->string('barangay');
            $table->text('home_address');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('religion');
            $table->string('mobile_phone');
            $table->string('city_municipality');

            // Educational Background
            $table->string('post_graduate_course')->nullable();
            $table->year('post_graduate_year')->nullable();
            $table->string('college_course')->nullable();
            $table->year('college_year')->nullable();
            $table->string('high_school')->nullable();
            $table->year('high_school_year')->nullable();
            $table->string('elementary')->nullable();
            $table->year('elementary_year')->nullable();
            $table->string('other_education')->nullable();
            $table->year('other_education_year')->nullable();

            // Emergency Contact Information
            $table->string('emergency_contact_name');
            $table->text('emergency_contact_address');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_phone');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabataans');
    }
};
