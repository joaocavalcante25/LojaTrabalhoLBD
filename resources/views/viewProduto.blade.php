@extends('paginaBase')
@section('conteudo')
<table class="table">
    <a class="btn btn-primary" href="/cadastroproduto" type="button" style="color:#ffff;">Novo</a>
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <th scope="row">{{$produto->id}}</th>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->preco}}</td>
                <td>{{$produto->qtd_estoque}}</td>
                
                <td><button class="btn btn-primary" onclick="update({{$produto->id}})" type="button">Editar</button></td>
                <td><button type="button" onclick="deleta({{$produto->id}})" class="btn btn-danger">Excluir</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    function deleta(id){
        window.location.href = "http://127.0.0.1:8000/deletaproduto/"+id;
    }
    function update(id){
        window.location.href = "http://127.0.0.1:8000/updateproduto/"+id;
    }
</script>
@endsection