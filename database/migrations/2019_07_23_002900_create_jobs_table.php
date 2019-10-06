<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->bigInteger('company_id');
            $table->text('job_title');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->text('address');
            $table->integer('career_level_id');
            $table->integer('start_years_of_experience');
            $table->integer('end_years_of_experience')->nullable();
            $table->integer('vacancies');
            $table->integer('start_salary')->nullable();
            $table->integer('end_salary')->nullable();
            $table->integer('salary_type_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->tinyInteger('hide_salary')->default(0);
            $table->text('job_description');
            $table->text('job_requirements');
            $table->tinyInteger('hide_company')->default(0);
            $table->bigInteger('clicks')->default(0);
            $table->integer('receive_emails')->default(0);
            $table->text('email_reference')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
