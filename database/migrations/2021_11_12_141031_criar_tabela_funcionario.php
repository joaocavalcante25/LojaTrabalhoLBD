<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if (!Schema::hasTable('funcionario')){
            Schema::create('funcionario', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->date('data_trabalho')->nullable();
                $table->string('endereco');
                $table->char('telefone', 11);
                
            });
        }

        if (Schema::hasTable('pessoa')){
            Schema::table('funcionario', function (Blueprint $table) {
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
        Schema::dropIfExists('funcionario');
    }
}
