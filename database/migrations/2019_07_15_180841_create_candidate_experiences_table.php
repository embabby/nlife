<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('candidate_id');
            $table->string('company_name')->nullable();
            $table->string('salary')->nullable();
            $table->string('company_location')->nullable();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->integer('current')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('candidate_experiences');
    }
}
