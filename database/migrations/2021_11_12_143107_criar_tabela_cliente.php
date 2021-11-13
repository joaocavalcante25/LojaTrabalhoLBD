<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cliente')){
            Schema::create('cliente', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->date('data_cadastro');

            });
        }

        if (Schema::hasTable('pessoa')){
            Schema::table('cliente', function (Blueprint $table) {
                $table->unsignedBigInteger('id_pessoa');
                $table->foreign('id_pessoa')->references('id')->on('pessoa');
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
        Schema::dropIfExists('cliente');

        
    }
}
