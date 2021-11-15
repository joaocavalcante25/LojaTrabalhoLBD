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
use App\Models\User;

class Controladora extends Controller
{
    //
    public function cadastroCliente(Request $requests){

        $cpf = $requests->cpf;
        $nome = $requests->nome;
        $email = $requests->email;
        $senha = $requests->senha;
        $segsenha = $requests->segsenha;
        if(is_string($cpf) and is_string($nome) and $segsenha === $senha){
            try{
                $pessoa = User::create([
                    'cpf' => $cpf,
                    'name' => $nome,
                    'email'=>$email,
                    'password'=>$senha
                ]);
                $pessoa->save();
            }catch(Exeption $e){
                return view('viewCadastro', ['status'=>false, 'massage'=>'usuario já existe']);
            }
        }else{
            return view('viewCadastro', ['status'=>false]);
        }
        try{
            $cliente = Cliente::create([
                "data_cadastro" => date('Y-m-d'),
                "id_pessoa" => $pessoa->id,
            ]);
            $cliente->save();
            return view('viewCadastro', ['status'=>true]);
        }
        catch(Exception $e){
            return view('viewCadastro', ['status'=>true, "message"=>$e->getMessage()]);
        }

    }

    public function createFuncionario(Request $requests){

        $email = $requests->email;
        $cpf = $requests->cpf;
        $nome = $requests->nome;
        $telefone = $requests->telefone;
        $endereco = $requests->endereco;
        $senha = $requests->senha;
        $segsenha = $requests->segsenha;
        if(is_string($cpf) and is_string($nome) and $segsenha === $senha){
            $pessoa = User::create([
                'cpf' => $cpf,
                'name' => $nome,
                'email'=>$email,
                'password'=>$senha
            ]);
            $pessoa->save();
        }else{
            return view('cadastroFuncionario', ['status'=>false]);
        }
        if(is_string($telefone) and is_string($endereco)){
            $funcionario = Funcionario::create([
                "telefone"=>$telefone,
                "data_trabalho" => date('Y-m-d'),
                "id_pessoa"=>$pessoa->id,
                "endereco"=>$endereco
            ]);
            $funcionario->save();
            return view('cadastroFuncionario', ['status'=>true]);
        }else{
            return view('cadastroFuncionario', ['status'=>false]);
        }


    }


    public function cadastraProduto(Request $requests){
        $nome = $requests->nome;
        $preco = (float)$requests->preco;
        $qtd_estoque = (int)$requests->qtd_estoque;
        $tamanho = (int)$requests->tamanho;

        if (is_string($nome) and $qtd_estoque > 0 and is_float($preco) and $tamanho > 0 and is_numeric($qtd_estoque) and is_numeric($tamanho)){
            $produto = Produto::create([
                "nome"=>$nome,
                "preco"=>$preco,
                "qtd_estoque"=>$qtd_estoque,
                "tamanho"=>$tamanho,
            ]); 

            $produto->save();
            return view('viewCadastroProduto', ['status'=>true]);

        }
        else{
            return view('viewCadastroProduto', ['status'=>false]);
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

    public function getProduto(Request $requests){

        return view('viewProduto', ['produtos'=>Produto::all()]) ;
    }

    public function getClientes(Request $requests){
        $clientes = Cliente::all();
        $lista = [];
        foreach($clientes as $cliente){
            $pessoa = User::where('id',$cliente->id_pessoa)->get()[0];
            $pessoa = ["cpf"=>$pessoa->cpf, "email"=>$pessoa->email, "nome"=>$pessoa->name, "id"=>$cliente->id];
            array_push($lista, $pessoa);
        }


        return view('viewCliente', ['clientes'=>$lista]) ;
    }

    public function getFuncionarios(Request $requests){
        $clientes = Funcionario::all();
        $lista = [];
        foreach($clientes as $cliente){
            $pessoa = User::where('id',$cliente->id_pessoa)->get()[0];
            $pessoa = ["cpf"=>$pessoa->cpf,"endereco"=> $cliente->endereco,"telefone"=>$cliente->telefone,"email"=>$pessoa->email, "nome"=>$pessoa->name, "id"=>$cliente->id];
            array_push($lista, $pessoa);
        }
        return view('viewColaborador', ['colaboradores'=>$lista]) ;
    }

    public function deletProduct($id){
        $produto = Produto::find($id);
        if(!is_null($produto)){
            $produto->delete();
            
        }
        return view('viewProduto', ['produtos'=>Produto::all()]);
    }


    public function updateProduto(Request $requests, $id){
        $nome = $requests->nome;
        $preco = (float) $requests->preco;
        $quantidade =(int) $requests->qtd_estoque;
        $tamanho = (int)$requests->tamanho;
        $produto = Produto::find($id);
        if(!is_null($produto)){
            $produto->nome = $nome;
            $produto->preco = $preco;
            $produto->qtd_estoque = $quantidade;
            $produto->tamanho = $quantidade;
            $produto->save();
        }
        return view('viewProduto', ['produtos'=>Produto::all()]);
    }

    public function addProduct(Request $request){
        $minutes = 60;
        Cookie::queue('produtos', $request->test, 10);
        $response->withCookie(cookie('produtos', 'MyValue', $minutes));
        return $response;
    }

    public function getProduct(Request $request){
        $value = $request->cookie('produtos');
        echo $value;
    }

}
