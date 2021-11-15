@extends('baseCadastro')
@section('form')


<form method="POST" action="{{ Route('update.produto', $id) }}">
    @csrf
    <div class="input-group">
        <h4>Update produto:{{$id}}</h4>
    </div>
    <div class="input-group mt-1">
        @isset($status)
            @if ($status)
                <div class="alert alert-success" role="alert">
                    success!
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    Alerta falha
                </div>
            @endif
        @endisset
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="nome" class="form-control input_user" value="" placeholder="nome" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="preco" class="form-control input_user" value="" placeholder="preco" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="qtd_estoque" class="form-control input_user" value="" placeholder="quantidade em estoque" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="tamanho" class="form-control input_user" value="" placeholder="tamanho" required>
    </div>
    <div class="d-flex justify-content-center mt-3 login_container">
        <button type="submit" name="button" class="btn login_btn">Cadastrar</button>
        <a type="submit" href="/produto" name="button" class="btn login_btn ml-3">Voltar</a>
    </div>
</form>
@endsection