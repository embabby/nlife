<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('phone');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->text('address');
            $table->tinyInteger('terms_conditions');
            $table->date('year_founded')->nullable();
            $table->bigInteger('company_size_id');
            $table->integer('company_type_id');
            $table->text('about_company')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('twitter')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('email_preference')->nullable();
            $table->string('receive_emails')->default(1);
            $table->bigInteger('downloaded_cvs')->default(0);
            $table->bigInteger('unlocked_accounts')->default(0);
            $table->bigInteger('posted_jobs')->default(0);
            $table->bigInteger('plan_id')->default(0);
            $table->bigInteger('plan_job_posts')->default(0);
            $table->bigInteger('plan_cvs')->default(0);
            $table->bigInteger('plan_profiles')->default(0);
            $table->bigInteger('plan_expiry_days')->default(0);
            $table->date('plan_start_date')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
