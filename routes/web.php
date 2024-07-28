<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PrincipalController@index')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@index')->name('site.sobreNos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@index')->name('site.contato')->middleware('log.acesso');

Route::post('/contato', 'App\Http\Controllers\ContatoController@store')->name('site.contato');
Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')
    ->prefix('app')
    ->group(
        function () {
            Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
            Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');

            Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
            Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
            Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
            Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
            Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
            Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');
            Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\FornecedorController@excluir')->name('app.fornecedor.excluir');

            Route::resource('produto', ProdutoController::class);
            Route::resource('produto-detalhe', ProdutoDetalheController::class);
            Route::resource('cliente', ClienteController::class);
            Route::resource('pedido', PedidoController::class);
            //Route::resource('pedido-produto', PedidoProdutoController::class);
            Route::get('pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido-produto.create');
            Route::post('pedido-produto/store/{pedido}', 'App\Http\Controllers\PedidoProdutoController@store')->name('pedido-produto.store');
            Route::delete('pedido-produto/destroy/{pedidoProduto}', 'App\Http\Controllers\PedidoProdutoController@destroy')->name('pedido-produto.destroy');
        }
    );

Route::fallback(function () {
    echo '<h3>A rota acessada não existe! <a href="' . route('site.index') . '">clique aqui</a> para voltar à página inicial.</h3>';
});
