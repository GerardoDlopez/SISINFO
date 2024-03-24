<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use App\Models\Ocupacion;
use App\Models\Promovido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PromovidoController extends Controller
{
    
    public function promovido_read(){
        $promovidos = Promovido::orderBy('id', 'desc')->paginate(10);
        $observaciones = Observacion::all();
        $usuarios = User::all();
        $ocupaciones = Ocupacion::all();

        $allpromovidos_count = $promovidos->total();
        $filtrados_count = $promovidos->total();

        $lider_selected = '';
        $observacion_selected = '';
        $ocupacion_selected = '';

        $seccion = '';
        $localidad = '';
        $ocupacion = '';
        $escolaridad = '';
        $genero = '';
        $edad = '';
        $observacion = '';
        return view('promovidos.read',compact(
            'promovidos',
            'observaciones',
            'usuarios',
            'ocupaciones',

            'lider_selected',
            'observacion_selected',
            'ocupacion_selected',

            'seccion',
            'localidad',
            'ocupacion',
            'escolaridad',
            'genero',
            'edad',
            'observacion',

            'allpromovidos_count',
            'filtrados_count'
        ));
    }

    public function promovido_create(){
        $users= User::all();
        $ocupaciones = Ocupacion::all();
        $observaciones = Observacion::all();
        return view('promovidos.create',compact('users','ocupaciones','observaciones'));
    }

    public function promovido_store(Request $request ){

        // Extraer género y fecha de nacimiento de la clave de elector
        $claveElector = $request->clave_elec;
        // Obtener fecha de nacimiento
        $dia = substr($claveElector, 10, 2);
        $mes = substr($claveElector, 8, 2);
        $anio = substr($claveElector, 6, 2);

        // Validar año para personas nacidas después del 2000
        if ($anio >= 0 && $anio <= 24) {
            $fechaNacimiento = "20$anio-$mes-$dia"; // Para años desde 00 hasta 21
        } else {
            $fechaNacimiento = "19$anio-$mes-$dia"; // Para años anteriores a 2000
        }
        // Calcular edad
        $fechaActual = date('Y-m-d');
        $edad = date_diff(date_create($fechaNacimiento), date_create($fechaActual))->y;
        // Determinar el género
        $genero = strtoupper(substr($claveElector, 14, 1)); // Convertir a mayúsculas para uniformidad
        dd($edad,$genero);

        
        $validated = $request->validate([
            'curp' =>['unique:promovidos,curp'],
            'clave_elec' =>['unique:promovidos,clave_elec']
        ], $messages = [
            'curp.unique' => 'La curp ya existe!',
            'clave_elec.unique' => 'La clave de elector ya existe!',
        ]);

        if($request->inputOcupacion){
            $ocupacion = new Ocupacion();
            $ocupacion->nombre = $request->inputOcupacion;
            $ocupacion->save();
            $request->merge(['id_ocupacion' => $ocupacion->id]);
        }
        
        $promovido = new Promovido();
        $promovido->seccion_elec=$request->seccion_elec;
        $promovido->nombre=$request->nombre;
        $promovido->apellido_pat=$request->apellido_pat;
        $promovido->apellido_mat=$request->apellido_mat;

        $promovido->localidad_y_domicilio=$request->localidad_y_domicilio;

        $promovido->clave_elec=$request->clave_elec;
        
        //$promovido->curp=$request->curp;

        $promovido->telefono=$request->telefono;
        
        //$promovido->tel_fijo=$request->tel_fijo;
        
        $promovido->correo=$request->correo;
        $promovido->facebook=$request->facebook;
        $promovido->id_ocupacion=$request->id_ocupacion;
        $promovido->escolaridad=$request->escolaridad;

        $fecha_captura = Carbon::createFromFormat('d/m/Y', $request->fecha_captura);
        $fecha_captura = $fecha_captura->format('Y-m-d');
        
        //$promovido->genero=$request->genero;
        //$promovido->edad=$request->edad;
        
        if ($request->observaciones) {
            foreach ($request->observaciones as $observacion) {
                $promovido->observaciones()->attach($observacion);
            }
        }
        
        $promovido->id_usuario=$request->id_usuario;
        
        $promovido->fecha_captura=$fecha_captura;

        

        
        $promovido->save();

        
        return redirect()->route('promovido.create')->with('agregar','ok');
    }

    public function promovido_edit(Promovido $promovido){
        $users = User::all();
        $ocupaciones = Ocupacion::all();
        $observaciones = Observacion::all();
        $genero = $promovido->genero;
        $observacion_selected = $promovido->observaciones->pluck('nombre','nombre')->all();
        $fecha_captura = Carbon::createFromFormat('Y-m-d', $promovido->fecha_captura);
        $fecha_captura = $fecha_captura->format('d/m/Y');
        return view('promovidos.update',compact('promovido','users','genero', 'ocupaciones', 'observaciones', 'observacion_selected','fecha_captura'));
    }
    
    public function promovido_update(Promovido $promovido, Request $request){
        if ($promovido->curp != $request->curp) {
            
            $validated = $request->validate([
                'curp' =>['unique:promovidos,curp'],
            ], $messages = [
                'curp.unique' => 'La curp ya existe!',
            ]);
        }

        if ($promovido->clave_elec != $request->clave_elec) {
            $validated = $request->validate([
                'clave_elec' =>['unique:promovidos,clave_elec']
            ], $messages = [
                'clave_elec.unique' => 'La clave de elector ya existe!',
            ]);
        }

        $fecha_captura = Carbon::createFromFormat('d/m/Y', $request->fecha_captura);
        $fecha_captura = $fecha_captura->format('Y-m-d');
        
        $data =[
            'seccion_elec' => $request->seccion_elec,
            'nombre' => $request->nombre,
            'apellido_pat' => $request->apellido_pat,
            'apellido_mat' => $request->apellido_mat,
            'domicilio' => $request->domicilio,
            'localidad' => $request->localidad,
            'clave_elec' => $request->clave_elec,
            'curp' => $request->curp,
            'tel_celular' => $request->tel_celular,
            'tel_fijo' => $request->tel_fijo,
            'correo' => $request->correo,
            'facebook' => $request->facebook,
            'id_ocupacion' => $request->ocupacion,
            'escolaridad' => $request->escolaridad,
            'fecha_captura' => $fecha_captura,
            'genero' => $request->genero,
            'edad' => $request->edad,
            'id_usuario' => $request->id_usuario,
        ];
        $promovido->observaciones()->sync($request->observaciones);
        $promovido->update($data);

        return redirect()->route('promovido.read')->with('actualizar','ok');
    }

    public function promovido_delete(Promovido $promovido){
        $promovido->delete();
        return redirect()->route('promovido.read')->with('eliminar','ok');
    }
}
