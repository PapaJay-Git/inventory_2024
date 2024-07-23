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
        Schema::create('daycares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('eccdfid');

            // Facility Location
            $table->string('facility_region');
            $table->string('facility_province');
            $table->string('facility_city_municipality');
            $table->string('facility_barangay');
            $table->string('facility_street_address');
            $table->string('facility_name');
            $table->string('service_provider');

            // Child Information
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('ext')->nullable(); // Extension (Jr., Sr.)
            $table->string('nickname')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->integer('birth_order')->nullable();
            $table->integer('no_of_siblings')->nullable();
            $table->date('date_of_birth');
            $table->string('birthplace');
            $table->date('birth_registered');

            // Home Address
            $table->string('home_region');
            $table->string('home_province');
            $table->string('home_city_municipality');
            $table->string('home_barangay');
            $table->string('home_street_address');

            $table->string('religion')->nullable();
            $table->string('ethnicity')->nullable();

            // Nutrition and Services
            $table->boolean('breastfeeding')->default(false);
            $table->enum('kind_of_breastfeeding', ['Exclusive', 'Mixed'])->nullable();
            $table->integer('breastfed_for_months')->nullable();
            $table->boolean('supplementary_feeding')->default(false);
            $table->integer('supplementary_feeding_for_days')->nullable();

            // Disability Information
            $table->boolean('has_disability')->default(false);
            $table->string('referred_for_assistance')->nullable();

            // Additional Information
            $table->boolean('listahanan_identified')->default(false);
            $table->boolean('pantawid_beneficiary')->default(false);
            $table->string('household_id')->nullable();

            // Participation Fee
            $table->boolean('participation_fee_paid')->default(false);
            $table->decimal('participation_fee_amount', 8, 2)->nullable();

            // Session Information
            $table->enum('scheduled_session', ['Morning', 'Afternoon'])->nullable();

            // Parent's Counterpart
            $table->enum('parents_counterpart', ['Cash', 'In Kind', 'None'])->nullable();

            // Attendance Status
            $table->enum('attendance_status', ['Continuing', 'Dropped Out', 'Graduated'])->nullable();
            $table->string('school_year')->nullable();
            $table->enum('dropout_reason', ['Illness', 'Transfer of Residence', 'Others'])->nullable();
            $table->string('dropout_reason_others')->nullable();

            // Accomplished By
            $table->string('accomplished_by');
            $table->date('date_accomplished');
            $table->string('name_of_eccd_service_provider');
            $table->string('encoder_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daycares');
    }
};
