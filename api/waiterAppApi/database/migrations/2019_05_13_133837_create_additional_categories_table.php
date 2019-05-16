<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idCategory');
            $table->foreign('idCategory')->references('id')->on('categories');
            $table->unsignedInteger('idAdditional');
            $table->foreign('idAdditional')->references('id')->on('additionals');
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
        Schema::dropIfExists('additional_categories');
    }
}
