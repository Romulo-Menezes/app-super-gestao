<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class SobreNosController extends Controller
{
    public function index() {
        return view('site.sobre-nos');
    }
}
