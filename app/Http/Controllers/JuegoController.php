<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index()
    {
        return view('pantalla_juego');
    }
}
