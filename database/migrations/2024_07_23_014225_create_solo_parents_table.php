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
            $table->string('case_number')->nullable();
            $table->string('full_name');
            $table->string('philys_card_number')->nullable();
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('place_of_birth')->nullable();

            // Residence Address
            $table->text('address')->nullable();

            // Additional Information
            $table->string('educational_attainment')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('company_agency')->nullable();
            $table->enum('employment_status', ['Employed', 'Self-employed', 'Not employed'])->nullable();
            $table->decimal('monthly_income', 15, 2)->nullable();
            $table->string('contact_numbers')->nullable();
            $table->boolean('pantawid_beneficiary')->default(false);
            $table->boolean('indigenous_person')->default(false);
            $table->boolean('lgbtq')->default(false);
            $table->boolean('pwd')->default(false);
            $table->string('email_address')->nullable();
            $table->text('classification_circumstances')->nullable();
            $table->text('needs_problems')->nullable();

            // Emergency Contact Information
            $table->string('emergency_name')->nullable();
            $table->text('emergency_address')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_relationship')->nullable();

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
