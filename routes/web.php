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

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'index'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('app')->group( function(){
    Route::get('/clientes', function(){ return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'produtos'; })->name('app.produtos'); 
});

Route::fallback(function(){
    echo '<h3>A rota acessada não existe! <a href="'.route('site.index').'">clique aqui</a> para voltar à página inicial.</h3>';
});

// Exemplo de passagem e tratamento de parâmetros 
// Route::get(
//     '/contato/{nome}/{categoriaId?}/{mensagem?}',
//     function(
//         string $nome,
//         ?int $categoriaId = 1,
//         ?string $mensagem = 'Nenhuma mensagem passada'
//     ) {
//         echo "<h3>Nome: $nome <br/>Categoria ID: $categoriaId <br/>Mensagem: $mensagem<h3/>";
//     }
// )->where(['nome' => '[A-Za-z]+', 'categoriaId' => '[0-9]+']);

// Exemplo de redirecionamento de rotas
// Route::get('/rota1', function (){
//     echo 'Rota 1';
// })->name('site.rota1');

// //Route::redirect('/rota2', 'rota1');

// Route::get('/rota2', function (){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');
