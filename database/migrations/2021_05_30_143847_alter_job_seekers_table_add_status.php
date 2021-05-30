<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJobSeekersTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_seekers', function (Blueprint $table) {
            $table->boolean('reviewed')->default(0)->after('unemployed');
            $table->boolean('status')->default(0)->after('reviewed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_seekers', function (Blueprint $table) {
            //
        });
    }
}
