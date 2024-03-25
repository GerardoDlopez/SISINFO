<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Promovido;

class PdfController extends Controller
{
    public function pdf(Request $request){

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
         })->paginate(10);
        $pdf = Pdf::loadView('pdf.promovidos_pdf', ['promovidos'=>$promovidos]);
        return $pdf->stream();
    }
}
