<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use App\Models\User;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    
    public function credencial_read(){
        $credenciales = Credencial::all();
        return view('credenciales.read',compact('credenciales'));
    }

    public function credencial_create(){
        $users= User::all();
        return view('credenciales.create',compact('users'));
    }

    public function credencial_store(Request $request ){
        $credencial = new Credencial();
        $credencial->nombre=$request->nombre;
        $credencial->apellido_pat=$request->apellido_pat;
        $credencial->apellido_mat=$request->apellido_mat;
        $credencial->edad=$request->edad;
        $credencial->domicilio=$request->domicilio;
        $credencial->apellido_pat=$request->apellido_pat;
        $credencial->apellido_mat=$request->apellido_mat;
        $credencial->domicilio=$request->domicilio;
        $credencial->clave_elec=$request->clave_elec;
        $credencial->curp=$request->curp;
        $credencial->fecha_nacimiento=$request->fecha_nacimiento;
        $credencial->genero=$request->genero;
        $credencial->id_usuario=$request->id_usuario;

        $credencial->save();
        return redirect()->route('credencial.create')->with('agregar','ok');
    }

    public function credencial_edit(Credencial $credencial){
        $users = User::all();
        $genero = $credencial->genero;
        return view('credenciales.update',compact('credencial','users','genero'));
    }
    
    public function credencial_update(Credencial $credencial, Request $request){
        $data =[
            'nombre' => $request->nombre,
            'apellido_pat' => $request->apellido_pat,
            'apellido_mat' => $request->apellido_mat,
            'edad' => $request->edad,
            'domicilio' => $request->domicilio,
            'clave_elec' => $request->clave_elec,
            'curp' => $request->curp,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'id_usuario' => $request->id_usuario,
        ];
        $credencial->update($data);

        return redirect()->route('credencial.read')->with('actualizar','ok');
    }

    public function credencial_delete(Credencial $credencial){
        $credencial->delete();
        return redirect()->route('credencial.read')->with('eliminar','ok');
    }
}
