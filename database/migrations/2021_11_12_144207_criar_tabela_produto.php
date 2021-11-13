<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('produto')){
    
            Schema::create('produto', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('nome')->nulable();
                $table->decimal('preco', $precision = 5, $scale = 2)->nulable();
                $table->integer('qtd_estoque');
                $table->integer('tamanho');


            });
        }
        if (Schema::hasTable('pedido')){
            
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
        Schema::dropIfExists('produto');
    }
}
