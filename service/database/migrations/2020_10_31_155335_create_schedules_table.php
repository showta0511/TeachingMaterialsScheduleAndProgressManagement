<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('for_goal_id')->unsigned();
            $table->foreign('for_goal_id')->references('id')->on('for_the_goals');
            $table->bigInteger('setting_schedule_id')->unsigned();
            $table->foreign('setting_schedule_id')->references('id')->on('setting_schedules');
            $table->date("date");
            $table->integer("first_page");
            $table->integer("last_page");
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
        Schema::dropIfExists('schedules');
    }
}
