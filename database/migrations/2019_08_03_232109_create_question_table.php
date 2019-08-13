<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->string('question');
            $table->string('r1');
            $table->string('r2');
            $table->string('r3');
            $table->string('r4');
            $table->string('r5');
            $table->string('img')->default('0');
            $table->foreign('form_id')->references('id')->on('tb_form');
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
        Schema::dropIfExists('tb_question');
    }
}
