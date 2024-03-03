<?php

namespace App\Http\Controllers;

use App\Enum\MotivoContatos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {
        $motivo_contatos = MotivoContatos::cases();

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
