<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pedido')){
            Schema::create('pedido', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->integer('qtd_vendida')->nulable();
            });
        }
        
        if (Schema::hasTable('produto')){
            
            Schema::table('pedido', function (Blueprint $table) {
                $table->unsignedBigInteger('id_produto');
                $table->foreign('id_produto')->references('id')->on('produto');
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
        Schema::dropIfExists('pedido');
    }
}
