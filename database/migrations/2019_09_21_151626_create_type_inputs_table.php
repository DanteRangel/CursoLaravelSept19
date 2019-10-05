<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\TypeInput;
class CreateTypeInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        TypeInput::create([ 'name' => 'select']);
        TypeInput::create([ 'name' => 'input']);
        TypeInput::create([ 'name' => 'textarea']);
        TypeInput::create([ 'name' => 'button']);
        TypeInput::create([ 'name' => 'a']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_inputs');
    }
}
