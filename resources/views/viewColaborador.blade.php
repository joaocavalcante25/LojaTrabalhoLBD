@extends('paginaBase')
@section('conteudo')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colaboradores as $colaborador)
            <tr>
                <th scope="row">{{$colaborador["id"]}}</th>
                <td>{{$colaborador["nome"]}}</td>
                <td>{{$colaborador["endereco"]}}</td>
                <td>{{$colaborador["cpf"]}}</td>
                <td>{{$colaborador["telefone"]}}</td>
                <td><button class="btn btn-primary" onclick="update({{$colaborador['id']}})" type="button">Editar</button></td>
                <td><button type="button" onclick="update({{$colaborador['id']}})" class="btn btn-danger">Excluir</button></td>
            </tr>
        @endforeach
        
    </tbody>
</table>
<script>
    function deleta(id){
        window.location.href = "http://127.0.0.1:8000/deletafuncionario/"+id;
    }
    function update(id){
        window.location.href = "http://127.0.0.1:8000/updatefuncionario/"+id;
    }
</script>
@endsection