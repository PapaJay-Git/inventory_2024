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
        Schema::create('child_disabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daycare_id')->constrained('daycares')->onDelete('cascade');
            $table->string('disability');
            $table->string('cause')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_disabilities');
    }
};
