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
        Schema::create('kababaihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Basic Information
            $table->date('date');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('city_address');
            $table->string('provincial_address');
            $table->date('date_of_birth');
            $table->string('birth_place');
            $table->enum('civil_status', config('app.civil_status'));
            $table->string('citizenship');
            $table->string('religion');
            $table->string('mobile_number');
            $table->enum('occupation', config('app.occupation'));
            $table->string('name_of_company')->nullable();
            $table->string('company_address')->nullable();
            $table->enum('educational_attainment', config('app.educational_attainment'));

            $table->string('spouse_name')->nullable();
            $table->enum('spouse_occupation', config('app.occupation'))->nullable();


            $table->integer('number_of_children')->default(0);
            $table->string('other_organizations_membership')->nullable();


            // Contact Information
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');

            // Image or ID Path
            $table->json('image_paths');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kababaihans');
    }
};
