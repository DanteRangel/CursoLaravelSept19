<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_form');
            $table->unsignedBigInteger('id_input');
            $table->unsignedBigInteger('id_type_input');
            $table->boolean('required');
            $table->string('validations');
            $table->string('name');
            $table->text('label');
            $table->foreign('id_form')->references('id')->on('forms');
            $table->foreign('id_input')->references('id')->on('inputs');
            $table->foreign('id_type_input')->references('id')->on('type_inputs');
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
        Schema::dropIfExists('questions');
    }
}
