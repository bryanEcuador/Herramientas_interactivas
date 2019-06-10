<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsObtainedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements_obtained', function (Blueprint $table) {
            $table->increments('id');
            $table->string("achievements1",200)->nullable();
            $table->string("achievements2",200)->nullable();
            $table->string("achievements3",200)->nullable();
            $table->string("achievements4",200)->nullable();
            $table->string("achievements5",200)->nullable();
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
        Schema::dropIfExists('achievements_obtained');
    }
}
