<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function index(Request $request) {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $request) {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000',
            ],
            [
                'nome.min' => 'O campo nome precisa ter no mínimo 3  caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'email.email' => 'O email informado não é válido',
                'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
                'required' => 'O campo :attribute deve ser preenchido'
            ]
        );

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
