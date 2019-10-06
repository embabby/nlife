<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id');
            $table->bigInteger('employer_id')->default(0);
            $table->bigInteger('job_id')->nullable();
            $table->bigInteger('candidate_id');
            $table->bigInteger('opened_contact')->default(0);
            $table->bigInteger('downloaded_cv')->default(0);
            $table->bigInteger('job_application_status_id')->default(\Config::get('constants.APPLIED'));  //1=applied //2=shortlisted //3=accepted  //4=rejected
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
        Schema::dropIfExists('job_applicants');
    }
}
