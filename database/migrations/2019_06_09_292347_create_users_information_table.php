<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200)->nullable();
            $table->integer('age',false,true)->nullable();
            $table->boolean("skill_analysis")->nullable();
            $table->boolean("skill_logic")->nullable();
            $table->boolean("skill_writing")->nullable();
            $table->boolean("skill_description")->nullable();
            $table->boolean("language_english")->nullable();
            $table->boolean("language_french")->nullable();
            $table->boolean("language_italian")->nullable();
            $table->integer("physical_disability",false,false)->nullable();
            $table->integer("mental_disability",false,false)->nullable();
            $table->integer("achievements_id")->unsigned();
            $table->integer("recognitions_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references('id')->on('users');
            $table->foreign("achievements_id")->references('id')->on('achievements_obtained');
            $table->foreign("recognitions_id")->references('id')->on('academic_recognitions');
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
        Schema::dropIfExists('users_information');
    }
}
