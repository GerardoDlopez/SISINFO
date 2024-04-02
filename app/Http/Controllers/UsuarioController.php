<?php

namespace App\Http\Controllers;

use App\Models\seccion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function user_create(){
        
        $permisos = Role::pluck('name','name')->all();
        $secciones = seccion::all();
        return view('user.create', ['permisos'=> $permisos,'secciones'=> $secciones]);
    }
    public function user_read(){
        $users= User::all();
        return view('user.read',[
            'users'=> $users
        ]);
    }
    public function user_store(Request $request){
        $user = new User();
        $user->name=$request->nombre;
        $user->email=$request->correo;
        $user->telefono=$request->telefono;
        $user->password = Hash::make($request->contraseña);
        $user->rol = $request->rol;
        $user->id_seccion = $request->id_seccion;
        $user->save();

        $user->syncRoles($request->permisos);

        return redirect()->route('user.read')->with('agregar','ok');
    }

    public function user_edit($user_id){
        
        $user = User::find($user_id);
        $permisos = Role::pluck('name','name')->all();
        $userPermiso =$user->roles->pluck('name','name')->all();
        $secciones = seccion::all();
        if($user->secciones){
            $userSeccion = $user->secciones->seccion;
        }else {
            $userSeccion = "";
        }

        return view('user.update',[
            'user'=> $user,
            'permisos'=> $permisos,
            'userPermiso'=> $userPermiso,
            'secciones'=> $secciones,
            'userSeccion'=> $userSeccion,
        ]);
    }
    public function user_update(Request $request, User $user){
        $data =[
            'name' => $request->nombre,
            'email' => $request->correo,
            'telefono' => $request->telefono,
            'rol'=> $request->rol,
            'id_seccion' => $request->id_seccion,
        ];
        if (!empty($request->contraseña)) {
            $data +=[
                'password' => Hash::make($request->contraseña),
            ];
        }
        $user->update($data);

        $user->syncRoles($request->permisos);

        return redirect()->route('user.read')->with('actualizar','ok');
    }

    public function user_delete(User $user){
        $user->delete();

        return redirect()->route('user.read')->with('eliminar','ok');
    }
}
