<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("user_id");
            $table->string("company_name");
            $table->text("investments");
            $table->text("about");
            $table->string("website");
            $table->string("email");
            $table->integer("range_id");
            $table->integer("market_id");
            $table->integer("interest_id");
            $table->integer("country_id");
            $table->integer("type_id");
            $table->string("logo");
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
        Schema::dropIfExists('investors');
    }
}
