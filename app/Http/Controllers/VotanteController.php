<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotanteController extends Controller
{
    public function votantes_read(){
        return view('votantes.create');
    }
}
