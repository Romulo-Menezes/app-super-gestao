<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Enum\MotivoContatos;

class ContatoController extends Controller
{
    public function index(Request $request) {
        $motivo_contatos = MotivoContatos::cases();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000',

        ]);

        SiteContato::create($request->all());
    }
}
