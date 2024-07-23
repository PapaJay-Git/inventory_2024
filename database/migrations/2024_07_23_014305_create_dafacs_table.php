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

            $table->string('region')->nullable();
            $table->string('province_district')->nullable();
            $table->string('city_municipality_barangay')->nullable();
            $table->string('barangay_evacuation_center_site')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('head_of_family_surname');
            $table->string('head_of_family_first_name');
            $table->string('head_of_family_middle_name')->nullable();
            $table->string('sex')->nullable();
            $table->integer('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('occupation')->nullable();
            $table->string('monthly_net_income')->nullable();
            $table->boolean('is_4ps_beneficiary')->default(false);
            $table->string('ip_type_of_ethnicity')->nullable();

            // Housing Information
            $table->boolean('house_lot_owner')->default(false);
            $table->boolean('rented_house_lot')->default(false);
            $table->boolean('house_with_rent_to_own')->default(false);
            $table->boolean('house_lot_with_consent_of_owner')->default(false);
            $table->boolean('house_rent_free_with_consent_of_owner')->default(false);
            $table->boolean('rent_free_house_lot_without_consent')->default(false);

            // Codes
            $table->boolean('is_cpwd')->default(false);
            $table->boolean('is_lactating_mother')->default(false);
            $table->boolean('is_pregnant')->default(false);
            $table->boolean('is_senior_citizen')->default(false);

            // Housing Condition
            $table->boolean('housing_condition_partially_damaged')->default(false);
            $table->boolean('housing_condition_totally_damaged')->default(false);

            // Health Condition
            $table->boolean('health_condition_dead')->default(false);
            $table->boolean('health_condition_injured')->default(false);
            $table->boolean('health_condition_missing')->default(false);
            $table->boolean('health_condition_with_illness')->default(false);

            // Signatures and Dates
            $table->string('signature_thumbmark_of_family_head')->nullable();
            $table->string('signature_of_brg_captain')->nullable();
            $table->date('date_registered')->nullable();
            $table->string('name_signature_of_lswdo')->nullable();

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
