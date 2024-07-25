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
        Schema::create('dafacs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('region');
            $table->string('province_district');
            $table->string('city_municipality_barangay');
            $table->string('barangay_evacuation_center_site');
            $table->string('serial_no');
            $table->string('head_of_family_surname');
            $table->string('head_of_family_first_name');
            $table->string('head_of_family_middle_name')->nullable();
            $table->enum('sex', config('app.sex'));
            $table->integer('age');
            $table->date('date_of_birth');
            $table->enum('occupation', config('app.occupation'));
            $table->decimal('monthly_net_income', 15, 2)->default(0);
            $table->boolean('is_4ps_beneficiary')->default(false);
            $table->boolean('is_indigenous_people')->default(false);
            $table->string('type_of_ethnicity')->nullable();

            // Housing Information
            $table->enum('housing_type', config('app.housing_type'));

            // Codes
            $table->enum('code', config('app.code'));

            // Housing Condition
            $table->enum('housing_condition', config('app.housing_condition'));

            // Health Condition
            $table->enum('health_condition', config('app.health_condition'));

            // Signatures and Dates
            $table->string('name_of_brg_captain')->nullable();
            $table->date('date_registered');
            $table->string('name_of_lswdo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dafacs');
    }
};
