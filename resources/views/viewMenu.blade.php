@extends('paginaBase')
@section('conteudo')
<div class="row">
    <div class="col-md-6">
        <div class="card" style="width: 100%;">
            <h5 class="card-header">PDV CH4</h5>
            <ul class="list-group list-group-flush overflow-auto" style="height: 25rem;">
                <li class="list-group-item">2 x Milkshake <span class="badge badge-secondary">R$ 26,00</span></li>
                <li class="list-group-item">1 x TopMix <span class="badge badge-secondary">R$ 15,00</span></li>
                <li class="list-group-item">3 x Shakemix <span class="badge badge-secondary">R$ 48,00</span></li>
                <li class="list-group-item">5 x Sundae <span class="badge badge-secondary">R$ 45,00</span></li>
                <li class="list-group-item">2 x Cream Tasty <span class="badge badge-secondary">R$ 30,00</span></li>
            </ul>
            <h5 class="card-header">Total: <span class="badge badge-secondary">R$ 164,00</span></h5>
            <button class="btn btn-primary">Finalizar Venda</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="width: 100%;" >
            <h5 class="card-header">Produtos</h5>
            <div class="list-group overflow-auto" style="height: 30rem;">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Milk Shake</h5>
                    <small>R$ 13,00</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Shake Mix</h5>
                    <small>R$ 16,00</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Top Mix</h5>
                    <small>R$ 15,00</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Sundae</h5>
                    <small>R$ 9,00</small>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Cream Tasty</h5>
                    <small>R$ 15,00</small>
                </div>
            </a>
            </div>
        </div>                
    </div>
</div>
@endsection