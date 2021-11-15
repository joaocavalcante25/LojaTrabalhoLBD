@extends('paginaBase')
@section('conteudo')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
               
                <th scope="row">{{$cliente['id']}}</th>
                <td>{{$cliente['nome']}}</td>
                <td>{{$cliente['email']}}</td>
                <td>{{$cliente['cpf']}}</td>
                <td><button class="btn btn-primary" onclick="update({{$cliente['id']}})" type="button">Editar</button></td>
                <td><button type="button" onclick="deleta({{$cliente['id']}})" class="btn btn-danger">Excluir</button></td>
            </tr>
        @endforeach
        
    </tbody>
</table>
<script>
    function deleta(id){
        window.location.href = "http://127.0.0.1:8000/deletacliente/"+id;
    }
    function update(id){
        window.location.href = "http://127.0.0.1:8000/updatecliente/"+id;
    }
</script>
@endsection