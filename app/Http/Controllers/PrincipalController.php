<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function index() {
        $motivo_contatos = MotivoContato::all();

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
