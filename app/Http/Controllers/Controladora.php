<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Funcionario;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaPedido;

class Controladora extends Controller
{
    //
    public function cadastroCliente(Request $requets){

        $cpf = $requests->cpf;
        $nome = $requests->nome;
        $pessoa = Pessoa::create([
            'cpf' => $cpf,
            'nome' => $nome,
        ]);

        $pessoa->save();

        $cliente = Cliente::create([
            "data_cadastro" => date('Y-m-d'),
            "id_pessoa" => $pessoa->id,
        ]);
        $cliente->save();


        return view('pgSucesso', ['success'=>TRUE]);


    }

    public function cadastroFuncionario(Request $requets){

        $cpf = $requests->cpf;
        $nome = $requests->nome;
        if(is_string($cpf) and is_string($nome)){
            $pessoa = Pessoa::create([
                'cpf' => $cpf,
                'nome' => $nome,
            ]);
            $pessoa->save();
        }

        $funcionario = Funcionario::create([
            "data_trabalho" => date('Y-m-d'),
        ]);

        $funcionario->save();


        return view('pgcSucesso', ['success'=>TRUE]);


    }


    public function cadastraProduto(Request $requets){
        $nome = $requests->nome;
        $preco = $requests->preco;
        $qtd_estoque = $requests->qtd_estoque;
        $tamanho = $requests->tamanho;

        if (is_string($nome) and is_float($preco) and is_numeric($qtd_estoque) and is_numeric($tamanho)){
            $produto = Produto::crete([
                "nome"=>$nome,
                "preco"=>$preco,
                "qtd_estoque"=>$qtd_estoque,
                "tamanho"=>$tamanho,
            ]); 
            $produto->save();
            return view('pgProduto', []);

        }
        else{
            return view('pgProduto', []);
        }

    }

    public function finalizarVenda(Request $requests ){

        $id_funcionario = $requests->id_funcionario;
        $id_cliente =  $requests->id_cliente;
        $id_venda = $requests->id_venda;
        $id_cliente = $requests->id_cliente;
        $qtd_vendida = $requests->qtd_vendida;
        $id_produto = $requests->id_produto; 
        
        if(is_numeric($id_funcionario) and is_numeric($id_cliente) and is_numeric($id_venda) and is_numeric($id_cliente) and is_numeric($qtd_vendida) and is_numeric($id_produto)){
            $venda = Venda::create([
                "id_funcionario"=>$id_funcionario,
                "id_cliente"=>$id_cliente,
            ]);
                
            $venda_pedido = VendaPedido::create([
                "id_venda"=>$id_venda,
                "id_item"=>$id_cliente,
            ]);
                
            $pedido = Pedido::create([
                "qtd_vendida"=>$qtd_vendida,
                "id_produto"=>$id_produto,
            ]);
            $venda->save();
            $venda_pedido->save();
            $pedido->save();
        }

        
    }
}
