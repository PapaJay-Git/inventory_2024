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
        Schema::create('household_compositions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solo_parent_id')->constrained('solo_parents')->onDelete('cascade');
            $table->string('name');
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->string('relationship')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('monthly_income', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('household_compositions');
    }
};
