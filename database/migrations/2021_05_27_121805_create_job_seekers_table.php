<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->default(null);
            $table->string('middle_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->text('mobile')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->text('nin')->nullable()->default(null);
            $table->text('dob')->nullable()->default(null);
            $table->enum('gender', ['male', 'female'])->default('female');
            $table->string('qualification')->nullable()->default(null);
            $table->enum('full_time_employment', ['yes', 'no'])->nullable()->default(null);
            $table->enum('on_job_training', ['yes', 'no'])->default('yes')->nullable()->default(null);
            $table->enum('social_benficiary', ['yes', 'no'])->default('yes')->nullable()->default(null);
            $table->text('unemployed')->nullable()->default(null);
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
        Schema::dropIfExists('job_seekers');
    }
}
