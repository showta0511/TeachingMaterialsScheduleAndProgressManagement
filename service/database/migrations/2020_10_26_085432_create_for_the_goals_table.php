<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForTheGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_the_goals', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->bigInteger('goal_id')->unsigned();
            $table->foreign('goal_id')->references('id')->on('goals');
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
        Schema::dropIfExists('for_the_goals');
    }
}
