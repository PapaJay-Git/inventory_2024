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
        Schema::create('pwds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Basic Information
            $table->enum('application_type', ['New Applicant', 'Renewal']);
            $table->string('pwd_number')->nullable();
            $table->date('date_applied')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('date_of_birth');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Separated', 'Cohabitation (live-in)', 'Widow/er']);

            // Disability Information
            $table->json('type_of_disability');
            $table->enum('cause_of_disability', ['Congenital / Inborn', 'Acquired'])->nullable();
            $table->json('specific_cause_of_disability')->nullable();

            // Residence Address
            $table->string('house_no_street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->string('region');

            // Contact Details
            $table->string('landline_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();

            // Educational Attainment
            $table->enum('educational_attainment', ['None', 'Kindergarten', 'Elementary', 'Junior High School', 'Senior High School', 'College', 'Vocational', 'Post Graduate']);

            // Employment Information
            $table->enum('status_of_employment', ['Employed', 'Unemployed', 'Self-employed']);
            $table->enum('types_of_employment', ['Permanent / Regular', 'Seasonal', 'Casual', 'Emergency'])->nullable();
            $table->enum('category_of_employment', ['Government', 'Private'])->nullable();
            $table->enum('occupation', ['Managers', 'Professionals', 'Technicians and Associate Professionals', 'Clerical Support Workers', 'Service and Sales Workers', 'Skilled Agricultural, Forestry and Fishery Workers', 'Craft and Related Trade Workers', 'Plant and Machine Operators and Assemblers', 'Elementary Occupations', 'Armed Forces Occupations', 'Others'])->nullable();
            $table->string('occupation_others')->nullable();

            // Organization Information
            $table->string('organization_affiliated')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('office_address')->nullable();
            $table->string('tel_nos')->nullable();

            // Identification Information
            $table->string('sss_no')->nullable();
            $table->string('gsis_no')->nullable();
            $table->string('pagibig_no')->nullable();
            $table->string('psn_no')->nullable();
            $table->string('philhealth_no')->nullable();

            // Family Background
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();

            // Accomplished By
            $table->string('accomplished_by_last_name')->nullable();
            $table->string('accomplished_by_first_name')->nullable();
            $table->string('accomplished_by_middle_name')->nullable();
            $table->enum('accomplished_by_role', ['Applicant', 'Guardian', 'Representative']);

            // Processing Information
            $table->string('name_of_certifying_physician')->nullable();
            $table->string('license_no')->nullable();
            $table->string('name_of_processing_officer')->nullable();
            $table->string('approving_officer')->nullable();
            $table->string('name_of_reporting_unit_office_section')->nullable();
            $table->string('control_no')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwds');
    }
};
