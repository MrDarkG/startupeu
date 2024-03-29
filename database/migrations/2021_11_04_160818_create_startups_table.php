<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("founded");
            $table->string("full_name");
            $table->integer("phone_index");
            $table->string("number");
            $table->string("ceo_email");
            $table->string("startup_email");
            $table->string("website");
            $table->text("what_your_company_does");
            $table->text("description");
            $table->text("inovation");
            $table->integer("stage_id");
            $table->integer("bussiness_model");
            $table->integer("target_audience");
            // $table->integer("industries_id");
            $table->integer("country_id");
            // $table->integer("looking_for_id");
            $table->integer("user_id");
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
        Schema::dropIfExists('startups');
    }
}
