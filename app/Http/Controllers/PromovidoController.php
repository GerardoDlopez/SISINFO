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
        $localidad_y_domicilio = '';
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

    public function promovido_create(){
        $users= User::all();
        $ocupaciones = Ocupacion::all();
        $observaciones = Observacion::all();
        return view('promovidos.create',compact('users','ocupaciones','observaciones'));
    }

    public function promovido_store(Request $request ){
        //validamos la clave elector
        $validated = $request->validate([
            'clave_elec' =>['unique:promovidos,clave_elec']
        ], $messages = [
            'clave_elec.unique' => 'La clave de elector ya existe!',
        ]);

        //validamos si quieren agregar una nueva ocupacion si es agreamos la nueva  ocupacion y la asignamos
        if($request->inputOcupacion){
            $ocupacion = new Ocupacion();
            $ocupacion->nombre = $request->inputOcupacion;
            $ocupacion->save();
            $request->merge(['id_ocupacion' => $ocupacion->id]);
        }
        if($request->clave_elec){
            // Extraer género y fecha de nacimiento de la clave de elector
            $claveElector = $request->clave_elec;
            // Obtener fecha de nacimiento
            $dia = substr($claveElector, 10, 2);
            $mes = substr($claveElector, 8, 2);
            $anio = substr($claveElector, 6, 2);

            $anioCompleto = ($anio >= 0 && $anio <= 24) ? "20$anio" : "19$anio";

            // Validar que los valores de día, mes y año sean numéricos y estén dentro de rangos válidos
            if (!is_numeric($dia) || !is_numeric($mes) || !is_numeric($anio) ||
            $dia < 1 || $dia > 31 || $mes < 1 || $mes > 12 || $anio < 0 || $anio > 99) {
            return redirect()->back()->withInput()->withErrors(['clave_elec' => 'Error: Revisa la clave de elector contiene una fecha de nacimiento invalida']);
            }

            // Validar año para personas nacidas después del 2000
            $fechaNacimiento = "$anioCompleto-$mes-$dia"; // Para años desde 00 hasta 

            // Validar que la fecha de nacimiento sea una fecha válida
            if (!checkdate($mes, $dia, $anioCompleto)) {
                return redirect()->back()->withInput()->withErrors(['clave_elec' => 'Error: Revista la clave elector, los datos para mes, dia y año no son validos']);
            }

            // Calcular edad
            $fechaActual = date('Y-m-d');
            $edad = date_diff(date_create($fechaNacimiento), date_create($fechaActual))->y;

            // Validar que la edad esté dentro de un rango esperado (opcional)
            if ($edad < 0 || $edad > 150) {
                return redirect()->back()->withInput()->withErrors(['clave_elec' => 'Error: Revista la clave elector, los datos para mes, dia y año no son validos']);
            }
            // Determinar el género
            $genero = strtoupper(substr($claveElector, 14, 1)); // Convertir a mayúsculas para uniformidad
        }
        //creamos un nuevo promovido
        $promovido = new Promovido();
        //asignamos la sección electoral
        $promovido->seccion_elec=$request->seccion_elec;
        //asignamos nombre y apellidos
        $promovido->nombre=$request->nombre;
        $promovido->apellido_pat=$request->apellido_pat;
        $promovido->apellido_mat=$request->apellido_mat;
        //Asignamos localidad y domicilio, calve elector, telefono,correo,faacebook,ocupacion,escolaridad
        $promovido->localidad_y_domicilio=$request->localidad_y_domicilio;
        $promovido->clave_elec=$request->clave_elec;
        $promovido->telefono=$request->telefono;
        $promovido->correo=$request->correo;
        $promovido->facebook=$request->facebook;
        $promovido->id_ocupacion=$request->id_ocupacion;
        $promovido->escolaridad=$request->escolaridad;
        //Asignamos el genero y la edad generados anteriormente  por medio de la clave elector
        if($request->clave_elec){
        $promovido->genero=$genero;
        $promovido->edad=$edad;
        }
        //cambiamos de formato la fecha de captura y la asignamos al promovido
        $fecha_captura = Carbon::createFromFormat('d/m/Y', $request->fecha_captura);
        $fecha_captura = $fecha_captura->format('Y-m-d');
        $promovido->fecha_captura=$fecha_captura;
        //Asignamos el lider al promovido
        $promovido->id_usuario=$request->id_usuario;
        
        $promovido->save();
        //CAPTURAR Y GUARDAR OBSERVACIONES DESPUES DE CREAR EL PROMOVIDO
        if ($request->observaciones) {
            foreach ($request->observaciones as $observacion) {
                $promovido->observaciones()->attach($observacion);
            }
        }
        
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
            'localidad_y_domicilio' => $request->localidad_y_domicilio,
            'clave_elec' => $request->clave_elec,
            'telefono' => $request->telefono,
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
