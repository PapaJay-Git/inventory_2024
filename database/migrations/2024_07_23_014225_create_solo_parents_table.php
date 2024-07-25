<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solo_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Basic Information
            $table->string('case_number');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('philsys_card_number')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('place_of_birth');

            // Residence Address
            $table->string('region');
            $table->string('province');
            $table->string('city_municipality');
            $table->string('barangay');
            $table->string('street_address');

            // Additional Information
            $table->enum('educational_attainment', config('app.educational_attainment'));
            $table->enum('civil_status', config('app.civil_status'));
            $table->enum('occupation', config('app.occupation'));
            $table->string('religion')->nullable();
            $table->string('company_agency');
            $table->enum('status_of_employment', config('app.status_of_employment'));
            $table->decimal('monthly_income', 15, 2)->default(0);
            $table->string('contact_numbers');
            $table->string('email_address')->nullable();
            $table->boolean('pantawid_beneficiary')->default(false);
            $table->string('household_id')->nullable();
            $table->boolean('indigenous_person')->default(false);
            $table->string('affiliation')->nullable();
            $table->boolean('lgbtq')->default(false);
            $table->boolean('pwd')->default(false);
            $table->text('classification_circumstances')->nullable();
            $table->text('needs_problems')->nullable();

            // Emergency Contact Information
            $table->string('emergency_name')->nullable();
            $table->text('emergency_address')->nullable();
            $table->string('emergency_number')->nullable();
            $table->string('emergency_relationship')->nullable();


            $table->enum('spo_status', config('app.spo_status'));
            $table->string('solo_parent_id_card_number')->nullable();
            $table->string('solo_parent_category')->nullable();
            $table->date('date_issuance')->nullable();
            $table->string('beneficiary_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solo_parents');
    }
};
