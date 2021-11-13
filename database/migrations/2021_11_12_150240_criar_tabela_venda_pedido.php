<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaVendaPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('venda_pedido')){
            Schema::create('venda_pedido', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

            });
        }

        if (Schema::hasTable('pedido') && Schema::hasTable('venda')){
            Schema::table('venda_pedido', function (Blueprint $table) {
                $table->unsignedBigInteger('id_venda');
                $table->unsignedBigInteger('id_item');
                $table->foreign('id_venda')->references('id')->on('pedido');
                $table->foreign('id_item')->references('id')->on('venda');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_pedido');
    }
}
