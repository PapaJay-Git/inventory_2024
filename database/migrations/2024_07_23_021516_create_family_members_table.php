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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dafac_id')->constrained('dafacs')->onDelete('cascade');
            $table->string('family_member_name');
            $table->string('relationship_to_head');
            $table->integer('age');
            $table->enum('gender', config('app.sex'));
            $table->string('education');
            $table->string('occupational_skills');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
