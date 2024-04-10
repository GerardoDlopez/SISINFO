<?php

namespace App\Http\Controllers;

use App\Models\Promovido;
use App\Models\seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class graficoController extends Controller
{
    public function grafico_read(){
        $secciones = seccion::withCount('promovidos')->get();
        // Iterar sobre cada sección y calcular el porcentaje alcanzado
        foreach ($secciones as $seccion) {
        $masculinos = DB::table('promovidos')->where('id_seccion', $seccion->id)->where('genero', 'M')->count();
        $femeninos = DB::table('promovidos')->where('id_seccion', $seccion->id)->where('genero', 'H')->count();
        
        $labels[]="$seccion->seccion $seccion->nombre";
        $promovidos[] =$seccion->promovidos_count;
        $meta[] = $seccion->meta;
        // Verificar si la sección tiene promovidos antes de calcular el porcentaje
        if ($seccion->promovidos_count > 0) {
            
            // Calcular el porcentaje alcanzado para esta sección
            $porcentajeAlcanzado = intval(($seccion->promovidos_count / $seccion->meta) * 100);
            $porcentaje_masculino = intval(($masculinos / $seccion->meta) * 100);
            $porcentaje_femenino = intval(($femeninos / $seccion->meta) * 100);
            // Agregar el porcentaje alcanzado a la sección
            $seccion->porcentaje = $porcentajeAlcanzado;
            $seccion->porcentaje_masculino = $porcentaje_masculino;
            $seccion->porcentaje_femenino = $porcentaje_femenino;
        } else {
            // Si la sección no tiene promovidos, el porcentaje alcanzado es 0
            $seccion->porcentaje = 0;
            $seccion->porcentaje_masculino = 0;
            $seccion->porcentaje_femenino = 0;
        }
        }
        return view('graficos.read',compact('secciones','labels','promovidos','meta'));
    }

    public function meta(seccion $seccion, Request $request){
        
        $seccion->meta = $request->meta;
        $seccion->update();
        return redirect()->route('grafico.read');
    }

    public function votos(){
        $secciones = seccion::withCount('promovidos')->get();
        // Iterar sobre cada sección y calcular el porcentaje alcanzado
        foreach ($secciones as $seccion) {
            
        $labels[]="$seccion->seccion $seccion->nombre";    
        $votos[] = DB::table('promovidos')->where('estatus_voto', 'true')->count();

        $promovidos[] =$seccion->promovidos_count;
        
        }
        return view('graficos.votos',compact('secciones','labels','promovidos','votos'));
    }
}
