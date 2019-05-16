<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparationOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparation_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idOrder');
            $table->foreign('idOrder')->references('id')->on('orders');
            $table->unsignedInteger('idPreparation');
            $table->foreign('idPreparation')->references('id')->on('preparations');
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
        Schema::dropIfExists('preparation_orders');
    }
}
