<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Use App\Perdiod;
use App\Period;

class AddPeriodsToPeriods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 18; $i < 50; $i++) {
            Period::create([
                'name' => '20' . $i . '-1'
            ]);
            Period::create([
                'name' => '20' . $i . '-2'
            ]);            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periods', function (Blueprint $table) {
            //
        });
    }
}
