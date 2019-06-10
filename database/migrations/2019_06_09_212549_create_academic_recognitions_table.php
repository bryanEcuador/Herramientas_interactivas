<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRecognitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_recognitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recongnitions1',200)->nullable();
            $table->string('recongnitions2',200)->nullable();
            $table->string('recongnitions3',200)->nullable();
            $table->string('recongnitions4',200)->nullable();
            $table->string('recongnitions5',200)->nullable();
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
        Schema::dropIfExists('academic_recognitions');
    }
}
