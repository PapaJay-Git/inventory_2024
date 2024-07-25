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
            $table->string('full_name');
            $table->enum('sex', config('app.sex'));
            $table->string('relationship');
            $table->date('birthdate');
            $table->integer('age');
            $table->enum('civil_status', config('app.civil_status'));
            $table->enum('educational_attainment', config('app.educational_attainment'));
            $table->enum('occupation', config('app.occupation'));
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
