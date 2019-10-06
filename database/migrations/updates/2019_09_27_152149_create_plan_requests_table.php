<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone');
            $table->bigInteger('plan_id');
            $table->bigInteger('employer_id')->nullable();
            $table->bigInteger('company_id')->nullable();

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
        Schema::dropIfExists('plan_requests');
    }
}
