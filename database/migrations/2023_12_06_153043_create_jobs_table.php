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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_logo');
            $table->string('company');
            $table->longText('company_details');
            $table->longText('requirement');
            $table->longText('qualification');
            $table->integer('vacancy');
            $table->string('description');
            $table->string('category');
            $table->string('location');
            $table->string('job_type');
            $table->string('job_salary');
            $table->string('tags');
            $table->date('deadline');
            $table->integer('status');
            $table->integer('recruiter_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
