<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('downloaded_cvs')->default(0);
            $table->bigInteger('unlocked_accounts')->default(0);
            $table->bigInteger('job_posts')->default(0);
            $table->tinyInteger('super_user')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('email_validated')->default(0);
            $table->dateTime('last_login')->nullable();
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
        Schema::drop('employers');
    }
}
