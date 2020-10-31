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
            $table->bigInteger('teaching_material_id')->unsigned();
            $table->foreign('teaching_material_id')->references('id')->on('teaching_materials');
            $table->bigInteger('for_goal_id')->unsigned();
            $table->foreign('for_goal_id')->references('id')->on('for_the_goals');
            $table->string('to_learn', 150);
            $table->date("first_day");
            $table->date("last_day")->nullable();
            $table->integer("first_page");
            $table->integer("last_page");
            $table->integer("daily_learning_page")->nullable();
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
