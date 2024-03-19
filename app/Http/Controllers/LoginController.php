<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');

        switch ($erro) {
            case '1':
                $erro = 'Usuário e/ou senha está incorreto';
                break;
            case '2':
                $erro = 'Necessário realizar login para ter acesso a página';
                break;
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo de e-mail é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

       if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
       } else {
            return redirect()->route('site.login', ['erro' => '1']);
       }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
