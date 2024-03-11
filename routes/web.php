<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;
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

Route::get('/', [PrincipalController::class, 'index'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('site.sobreNos');

Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato')->middleware('log.acesso');
    
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('app')->group( function(){
    Route::middleware('log.acesso', 'autenticacao')
        ->get('/clientes', function(){ return 'clientes'; })
        ->name('app.clientes');

    Route::middleware('log.acesso', 'autenticacao')
        ->get('/fornecedores', [FornecedorController::class, 'index'])
        ->name('app.fornecedores');

    Route::middleware('log.acesso', 'autenticacao')
        ->get('/produtos', function(){ return 'produtos'; })
        ->name('app.produtos'); 
});

Route::fallback(function(){
    echo '<h3>A rota acessada não existe! <a href="'.route('site.index').'">clique aqui</a> para voltar à página inicial.</h3>';
});
