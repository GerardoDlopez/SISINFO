<?php

namespace App\Http\Controllers;

use App\Models\Promovido;
use App\Models\Observacion;
use App\Models\Ocupacion;
use Illuminate\Http\Request;
use App\Models\User;

class FiltroController extends Controller
{
    public function filtro(Request $request){

        $promovidos = Promovido::query()->when($request->input('lider') !== null, function ($query) use ($request) { 
            $query->where('id_usuario', $request->input('lider'));
         })->when($request->input('seccion') !== null, function ($query) use ($request) { 
            $query->where('seccion_elec', $request->input('seccion'));
         })->when($request->input('localidad') !== null, function ($query) use ($request) { 
            $query->where('localidad', $request->input('localidad'));
         })->when($request->input('ocupacion') !== null, function ($query) use ($request) { 
            $query->where('id_ocupacion', $request->input('ocupacion'));
         })->when($request->input('escolaridad') !== null, function ($query) use ($request) { 
            $query->where('escolaridad', $request->input('escolaridad'));
         })->when($request->input('genero') !== null, function ($query) use ($request) { 
            $query->where('genero', $request->input('genero'));
         })->when($request->input('edad') !== null, function ($query) use ($request) { 
            $query->where('edad', $request->input('edad'));
         })->when($request->input('observacion') !== null, function ($query) use ($request) { 
            
            $query->wherehas('observaciones', function ($query) use ($request) {
                $query->where('nombre', $request->input('observacion'));}
            );
         })
         ->get();

        $observaciones = Observacion::all();
        $usuarios = User::all();
        $ocupaciones = Ocupacion::all();

        $lider_selected = $request->lider;
        $observacion_selected = $request->observacion;
        $ocupacion_selected = $request->ocupacion;

        $seccion = $request->seccion;
        $localidad = $request->localidad;
        $ocupacion = $request->ocupacion;
        $escolaridad = $request->escolaridad;
        $genero = $request->genero;
        $edad = $request->edad;
        $observacion = $request->observacion;

        $usuarios = User::all();
        return view('promovidos.read',compact(
            'promovidos',
            'observaciones',
            'ocupaciones',

            'lider_selected',
            'observacion_selected',
            'ocupacion_selected',
            
            'usuarios',
            'seccion',
            'localidad',
            'ocupacion',
            'escolaridad',
            'genero',
            'edad',
            'observacion',
        ));

        
        
    }
}
