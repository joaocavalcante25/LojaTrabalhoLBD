<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('venda')){
            Schema::create('venda', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

            });
        }
        
        if (Schema::hasTable('funcionario') && Schema::hasTable('cliente')){
            Schema::table('venda', function (Blueprint $table) {
                $table->unsignedBigInteger('id_funcionario');
                $table->unsignedBigInteger('id_cliente');
                $table->foreign('id_funcionario')->references('id')->on('funcionario');
                $table->foreign('id_cliente')->references('id')->on('cliente');
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
        Schema::dropIfExists('venda');
    }
}
