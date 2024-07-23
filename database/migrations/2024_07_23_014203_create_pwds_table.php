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

            // Application Details
            $table->enum('application_type', config('app.application_type'));
            $table->string('disability_number')->unique();
            $table->string('photo_path');
            $table->date('date_applied');

            // Personal Information
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('date_of_birth');
            $table->enum('sex', config('app.sex'));
            $table->enum('civil_status', config('app.civil_status'));
            $table->enum('type_of_disability', config('app.type_of_disability'));
            $table->enum('cause_of_disability', config('app.cause_of_disability'))->nullable();
            $table->string('cause_of_disability_others')->nullable();

            // Address Information
            $table->string('house_no_street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->string('region');

            // Contact Information
            $table->string('landline_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();

            // Educational and Employment Information
            $table->enum('educational_attainment', config('app.educational_attainment'));
            $table->enum('status_of_employment', config('app.status_of_employment'));
            $table->enum('types_of_employment', config('app.types_of_employment'));
            $table->enum('category_of_employment', config('app.category_of_employment'));
            $table->enum('occupation', config('app.occupation'))->nullable();
            $table->string('occupation_others')->nullable();

            // Organization Information
            $table->string('organization_affiliated')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_tel_no')->nullable();

            // Identification Numbers
            $table->string('sss_no')->nullable();
            $table->string('gsis_no')->nullable();
            $table->string('pagibig_no')->nullable();
            $table->string('psn_no')->nullable();
            $table->string('philhealth_no')->nullable();

            // Family Information
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('guardian_last_name')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_middle_name')->nullable();

            // Form Fill-up Information
            $table->enum('accomplished_by', config('app.accomplished_by'));
            $table->string('accomplished_by_last_name')->nullable();
            $table->string('accomplished_by_first_name')->nullable();
            $table->string('accomplished_by_middle_name')->nullable();

            // Certification Information
            $table->string('name_of_certifying_physician')->nullable();
            $table->string('license_no')->nullable();
            $table->string('processing_officer');
            $table->string('approving_officer');
            $table->string('encoder');
            $table->string('name_of_reporting_unit_office_section');
            $table->string('control_no');
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
