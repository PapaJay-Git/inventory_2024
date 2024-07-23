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
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('date_of_birth');
            $table->enum('sex', ['Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Separated', 'Widow/er']);

            // Contact Information
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();

            // Residence Address
            $table->string('house_no_street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->string('region');

            // Additional Information
            $table->string('occupation')->nullable();
            $table->string('organization_affiliated')->nullable();

            // Image or ID Path
            $table->string('image_path')->nullable();

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
