<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/login','App\Http\Controllers\LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')
    ->prefix('app')
    ->group( 
        function(){
            Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
            Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');
            Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('app.cliente');

            Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
            Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
            Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
            Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
            Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');

            Route::get('/produto', 'App\Http\Controllers\ProdutoController@index' )->name('app.produto'); 
        }
    );

Route::fallback(function(){
    echo '<h3>A rota acessada não existe! <a href="'.route('site.index').'">clique aqui</a> para voltar à página inicial.</h3>';
});
