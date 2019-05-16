<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount'); //qtd
            $table->decimal('unitPrice');
            $table->decimal('fullPrice');
            $table->string('reservations');
            $table->unsignedInteger('idProduct');
            $table->foreign('idProduct')->references('id')->on('products')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('detail_orders', function (Blueprint $table){
        $table->dropForeign('detail_orders_idproduct_foreign');
        $table->foreign('idProduct')
        ->references('id')->on('products')
        ->onDelete('cascade')
        ->onUpdate('cascade');
        
        });
    }
}
