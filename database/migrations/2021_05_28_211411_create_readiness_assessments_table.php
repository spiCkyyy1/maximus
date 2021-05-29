<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadinessAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readiness_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_seeker_id');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
            $table->text('question')->nullable()->default(null);
            $table->text('answer')->nullable()->default(null);
            $table->float('weighted_score')->nullable()->default(null);
            $table->text('competencies')->nullable()->default(null);
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
        Schema::dropIfExists('readiness_assessments');
    }
}
