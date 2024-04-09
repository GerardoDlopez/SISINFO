<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use App\Models\Ocupacion;
use App\Models\Promovido;
use App\Models\seccion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class PromovidoController extends Controller
{
    
    public function promovido_read(){
        $promovidos = Promovido::orderBy('id', 'desc')->paginate(10);
        
        $usuarios = User::all();
        $ocupaciones = Ocupacion::all();
        $secciones = seccion::all();

        $allpromovidos_count = $promovidos->total();
        $filtrados_count = $promovidos->total();

        $lider_selected = '';
        $ocupacion_selected = '';
        $seccion_selected = '';

        $domicilio = '';
        $ocupacion = '';
        $escolaridad = '';
        $genero = '';
        $edad = '';
        return view('promovidos.read',compact(
            'promovidos',
            'usuarios',
            'ocupaciones',
            'secciones',

            'lider_selected',
            'ocupacion_selected',
            'seccion_selected',

            'domicilio',
            'ocupacion',
            'escolaridad',
            'genero',
            'edad',

            'allpromovidos_count',
            'filtrados_count'
        ));
    }

    public function promovido_create(){
        $users= User::all();
        $ocupaciones = Ocupacion::all();
        $observaciones = Observacion::all();
        $secciones = seccion::all();
        return view('promovidos.create',compact('users','ocupaciones','observaciones','secciones'));
    }

    public function promovido_store(Request $request ){

        $nombreCompleto = $request->nombre . ' ' . $request->apellido_pat . ' ' . $request->apellido_mat;
        $claveElec = $request->clave_elec;
        $request->merge(['nombre' => $nombreCompleto]);

        $duplicados = Promovido::whereNotNull('clave_elec') // No traer registros con 'clave_elec' nulo
                      ->whereNotNull('nombre')     // No traer registros con 'nombre' nulo
                      ->where(function($query) use ($claveElec, $nombreCompleto) {
                          $query->where('clave_elec', $claveElec)
                                ->orWhere('nombre', $nombreCompleto);
                      })
                      ->get();

        if ($duplicados->isNotEmpty()) {
            $mensaje = 'Promovido ya existente en la base de datos:';
            foreach ($duplicados as $duplicado) {
                $mensaje .= " Clave_elec: $duplicado->clave_elec, Nombre: $duplicado->nombre";
            }
            return redirect()->back()->withInput()->withErrors(['clave_elec' => "Error: $mensaje "]);
        }

        //validamos la clave elector
        if($request->clave_elec){
            
            $estatus_credencial = 'valida';
            // Extraer género y fecha de nacimiento de la clave de elector
            $claveElector = $request->clave_elec;
            // Obtener fecha de nacimiento
            $dia = substr($claveElector, 10, 2);
            $mes = substr($claveElector, 8, 2);
            $anio = substr($claveElector, 6, 2);

            $anioCompleto = ($anio >= 0 && $anio <= 24) ? "20$anio" : "19$anio";

            // Validar año para personas nacidas después del 2000
            $fechaNacimiento = "$anioCompleto-$mes-$dia"; // Para años desde 00 hasta 

            // Validar que la fecha de nacimiento sea una fecha válida
            if (!checkdate($mes, $dia, $anioCompleto)) {
            $estatus_credencial = 'invalida';
            }

            // Calcular edad
            $fechaActual = date('Y-m-d');
            $edad = date_diff(date_create($fechaNacimiento), date_create($fechaActual))->y;

            // Validar que la edad esté dentro de un rango esperado (opcional)
            if ($edad < 0 || $edad > 150) {
                $estatus_credencial = 'invalida';
            }
            // Determinar el género
            $genero = strtoupper(substr($claveElector, 14, 1)); // Convertir a mayúsculas para uniformidad
        }else {
            $genero=null;
            $edad=null;
            $estatus_credencial=null;
        }

        if($request->inputPromotor){
            $promotor = new User();
            $promotor->name = $request->inputOcupacion;
            $promotor->rol = 'promotor';
            $promotor->id_seccion = $request->id_seccion;
            $promotor->save();
            $request->merge(['id_promotor' => $promotor->id]);
        }
        
        $fecha_captura = Carbon::now()->toDateString();
        
        

        //creamos un nuevo promovido
        $promovido = new Promovido();

        $data =[
            'id_seccion' => $request->id_seccion,
            'nombre' => $request->nombre,
            'localidad' => $request->localidad,
            'domicilio' => $request->domicilio,
            'clave_elec' => $request->clave_elec,
            'telefono' => $request->telefono,
            'id_ocupacion' => $request->ocupacion,
            'fecha_captura' => $fecha_captura,
            'genero' => $genero,
            'edad' => $edad,
            'id_promotor' => $request->id_promotor,
            'id_usuario' => $request->id_usuario,
            'estatus_credencial' => $estatus_credencial,
        ];

        $promovido->fill($data);
        $promovido->save();

        // Obtener el usuario autenticado
        $usuario = Auth::user();
        
        // Incrementar el contador de promovidos en la base de datos
        DB::table('users')
            ->where('id', $usuario->id)
            ->increment('cant_promovidos'); 
        
        return redirect()->route('promovido.create')->with('agregar','ok');
        }

    public function promovido_edit(Promovido $promovido){
        $users = User::all();
        $ocupaciones = Ocupacion::all();
        //$observaciones = Observacion::all();
        $secciones = seccion::all();

        $genero = $promovido->genero;
        //$observacion_selected = $promovido->observaciones->pluck('nombre','nombre')->all();

        if ($promovido->fecha_captura) {
            $fecha_captura = Carbon::createFromFormat('Y-m-d', $promovido->fecha_captura);
            $fecha_captura = $fecha_captura->format('d/m/Y');
        }else {
            $fecha_captura = null;
        }

        return view('promovidos.update',compact('promovido','users','genero', 'ocupaciones','secciones','fecha_captura'));
    }
    
    public function promovido_update(Promovido $promovido, Request $request){
        if ($request->clave_elec) {
            if ($promovido->clave_elec != $request->clave_elec) {
                $validated = $request->validate([
                    'clave_elec' =>['unique:promovidos,clave_elec']
                ], $messages = [
                    'clave_elec.unique' => 'La clave de elector ya existe!',
                ]);
            }
        }
        if ($request->fecha_captura) {
            $fecha_captura = Carbon::createFromFormat('d/m/Y', $request->fecha_captura);
            $fecha_captura = $fecha_captura->format('Y-m-d');
        }else {
            $fecha_captura = null;
        }
        
        $data =[
            'id_seccion' => $request->id_seccion,
            'nombre' => $request->nombre,
            'localidad' => $request->localidad,
            'domicilio' => $request->domicilio,
            'clave_elec' => $request->clave_elec,
            'telefono' => $request->telefono,
            'id_ocupacion' => $request->ocupacion,
            'fecha_captura' => $fecha_captura,
            'genero' => $request->genero,
            'edad' => $request->edad,
            'id_promotor' => $request->id_promotor,
            'id_usuario' => $request->id_usuario,
        ];
        $promovido->update($data);

        return redirect()->route('promovido.read')->with('actualizar','ok');
    }

    public function promovido_delete(Promovido $promovido){
        $promovido->delete();
        return redirect()->route('promovido.read')->with('eliminar','ok');
    }
}
