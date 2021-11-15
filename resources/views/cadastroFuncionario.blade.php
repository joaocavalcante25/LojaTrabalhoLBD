@extends('baseCadastro')
@section('form')


<form method="POST" action="{{ Route('create.funcionario') }}">
    @csrf
    <div class="input-group mt-5">
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
        <input type="email" name="email" class="form-control input_user" value="" placeholder="email" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="cpf" class="form-control input_user" value="" placeholder="cpf" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="endereco" class="form-control input_user" value="" placeholder="endereço" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="tel" name="telefone" class="form-control input_user" value="" placeholder="telefone" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="password" name="senha" class="form-control input_user" value="" placeholder="senha" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="password" name="segsenha" class="form-control input_user" value="" placeholder="senha" required>
    </div>
    <div class="d-flex justify-content-center mt-3 login_container">
        <button type="submit" name="button" class="btn login_btn">Cadastrar</button>
        <a type="submit" href="/colaborador" name="button" class="btn login_btn ml-3">Voltar</a>
    </div>
</form>
@endsection