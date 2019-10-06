<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email')->unique();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('gender_id')->default(1);
            $table->integer('martial_status_id')->nullable();
            $table->integer('military_status_id')->nullable();
            $table->string('cv')->nullable();
            $table->string('avatar')->nullable();
            $table->string('university')->nullable();
            $table->string('faculty')->nullable();
            $table->string('major')->nullable();
            $table->string('degree')->nullable();
            $table->date('university_start_date')->nullable();
            $table->date('university_end_date')->nullable();
            $table->string('job_title')->nullable();
            $table->decimal('current_salary',60)->nullable();
            $table->decimal('desired_salary',60)->nullable();
            $table->integer('salary_type_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->integer('availability')->default(1);
            $table->integer('open_for_job_status_id')->nullable();
            $table->dateTime('last_seen')->nullable();
            $table->text('about_me')->nullable();
            $table->bigInteger('profile_views')->default(0);
            $table->integer('career_level_id')->nullable();
            $table->string('password');
            $table->string('slug')->nullable();
            $table->integer('years_of_experience_id')->nullable();

                   $table->rememberToken();
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
        Schema::drop('candidates');
    }
}
