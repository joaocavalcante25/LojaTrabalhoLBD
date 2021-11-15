@extends('paginaBase')
@section('conteudo')
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
        <tr>
            <th scope="row">1</th>
            <td>Jeú Chaves Lima</td>
            <td>Bonito - MS</td>
            <td>111.222.333-44</td>
            <td>(67) 9 1111 2222</td>
            <td><button class="btn btn-primary" type="button">Editar</button></td>
            <td><button type="button" class="btn btn-danger">Excluir</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>João Cavalcante</td>
            <td>Campo Grande - MS</td>
            <td>222.333.444-55</td>
            <td>(67) 9 2222 3333</td>
            <td><button class="btn btn-primary" type="button">Editar</button></td>
            <td><button type="button" class="btn btn-danger">Excluir</button></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Salles</td>
            <td>Campo Grande - MS</td>
            <td>333.444.555-66</td>
            <td>(67) 9 3333 4444</td>
            <td><button class="btn btn-primary" type="button">Editar</button></td>
            <td><button type="button" class="btn btn-danger">Excluir</button></td>
        </tr>
    </tbody>
@endsection