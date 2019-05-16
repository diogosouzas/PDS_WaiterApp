<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('priceOrder');
            $table->string('status');
            $table->string('typePayment');

            $table->unsignedInteger('idClient');
            $table->foreign('idClient')->references('id')->on('clients')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedInteger('idTable');
            $table->foreign('idTable')->references('id')->on('tables')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('orders', function (Blueprint $table){
        $table->dropForeign('orders_idclient_foreign');
        $table->foreign('idClient')
        ->references('id')->on('clients')
        ->onDelete('cascade')
        ->onUpdate('cascade');
        $table->dropForeign('orders_idtable_foreign');
        $table->foreign('idTable')
        ->references('id')->on('tables')
        ->onDelete('cascade')
        ->onUpdate('cascade');
        });
    }
}
