<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function __construct() {
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function index() {
        return view('site.sobre-nos');
    }
}
