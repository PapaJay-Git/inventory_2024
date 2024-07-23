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
        Schema::create('child_eccd_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daycare_id')->constrained('daycares')->onDelete('cascade');
            $table->string('service_type');
            $table->string('service');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_eccd_experiences');
    }
};
