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
            Route::get('/clientes', function(){ return 'clientes'; })->name('app.clientes');
            Route::get('/fornecedores', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedores');
            Route::get('/produtos', function(){ return 'produtos'; })->name('app.produtos'); 
        }
    );

Route::fallback(function(){
    echo '<h3>A rota acessada não existe! <a href="'.route('site.index').'">clique aqui</a> para voltar à página inicial.</h3>';
});
