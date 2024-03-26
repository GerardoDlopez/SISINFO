<?php

namespace App\Http\Controllers;

use App\Models\Promovido;
use App\Models\Observacion;
use App\Models\Ocupacion;
use App\Models\seccion;
use Illuminate\Http\Request;
use App\Models\User;

class FiltroController extends Controller
{
    public function filtro(Request $request){



      $promovidos = Promovido::query()->when($request->input('lider') !== null, function ($query) use ($request) { 
            $query->where('id_usuario', $request->input('lider'));
         })->when($request->input('id_seccion') !== null, function ($query) use ($request) { 
            $query->where('id_seccion', $request->input('id_seccion'));
         })->when($request->input('localidad_y_domicilio') !== null, function ($query) use ($request) { 
            $query->where('localidad_y_domicilio', $request->input('localidad_y_domicilio'));
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
         })->paginate(10);

      $allpromovidos_count = Promovido::count();
      $filtrados_count = $promovidos->total();

      $observaciones = Observacion::all();
      $usuarios = User::all();
      $ocupaciones = Ocupacion::all();
      $secciones = seccion::all();

      $observacion_selected = $request->observacion;
      $ocupacion_selected = $request->ocupacion;
      $lider_selected = $request->lider;
      $seccion_selected = $request->id_seccion;

      $localidad_y_domicilio = $request->localidad_y_domicilio;
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
         'secciones',

         'lider_selected',
         'observacion_selected',
         'ocupacion_selected',
         'seccion_selected',
            
         'usuarios',
         'localidad_y_domicilio',
         'ocupacion',
         'escolaridad',
         'genero',
         'edad',
         'observacion',

         'allpromovidos_count',
         'filtrados_count'
      ));

        
        
    }
}
