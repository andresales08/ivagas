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
        Schema::create('vacancy_candidates', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('vacancy_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');

            $table->timestamps();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_candidates');
    }
};
