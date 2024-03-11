<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class SobreNosController extends Controller
{
    public function __construct() {
        $this->middleware('log.acesso');
    }

    public function index() {
        return view('site.sobre-nos');
    }
}
