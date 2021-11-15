<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controladora;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return view('viewLogin');
});

Route::get('/cadastro', function () {
    return view('viewCadastro');
});
Route::post('/cadastro', [Controladora::class, 'cadastroCliente'])->name('create.cliente');
Route::get('/colaborador', function () {
    return view('viewColaborador');
});

Route::get('/cadastrovendedor', function () {
    return view('cadastroFuncionario');
});
Route::post('/cadastrovendedor', [Controladora::class, 'createFuncionario'])->name('create.funcionario');
Route::get('/', [Controladora::class, 'getProduto']);
Route::get('/produto', [Controladora::class, 'getProduto']);
Route::get('/deletaproduto/{id}', [Controladora::class, 'deletProduct']);
Route::post('/updateproduto/{id}', [Controladora::class, 'updateProduto'])->name('update.produto');
Route::get('/updateproduto/{id}', function ($id) {
    return view('viewUpdateProduto', ['id'=>$id]);
});
Route::get('/menu', function () {
    return view('viewMenu');
});

Route::get('/cadastroproduto', function () {
    return view('viewCadastroProduto');
});

Route::post('/cadastroproduto', [Controladora::class, 'cadastraProduto'])->name('cadastro.produto');

Route::get('/cliente', [Controladora::class, 'getClientes']);
Route::get('/colaborador', [Controladora::class, 'getFuncionarios']);
Route::post('/cadastrar', function () {
    return view('viewCliente');
})->name('cadastrar.pessoa');