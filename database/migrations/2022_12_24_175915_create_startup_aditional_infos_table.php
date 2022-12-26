<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupAditionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_aditional_infos', function (Blueprint $table) {
            $table->id();
            $table->string('startup_id');
            $table->string('traction');
            $table->string('problem');
            $table->string('expected_revenue');
            $table->string('mmr_data');
            $table->string('current_arr');
            $table->string('retention');
            $table->string('custumer_acquisition');
            $table->string('prototype');
            $table->string('years_experience');
            $table->string('how_much_money');
            $table->string('how_much_percent');
            $table->string('churn_rate');
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
        Schema::dropIfExists('startup_aditional_infos');
    }
}
