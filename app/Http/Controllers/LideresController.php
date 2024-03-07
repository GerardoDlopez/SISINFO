<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\votante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class LideresController extends Controller
{
    public function lideres_create(){
        
        $roles = Role::pluck('name','name')->all();
        return view('lideres.create', ['roles'=> $roles]);
    }
    public function lideres_read(){
        $users= User::all();
        //$userRole =$users->roles->pluck('name','name')->all();
        return view('lideres.read',[
            'users'=> $users,
            //'userRole'=> $userRole
        ]);
    }
    public function lideres_store(Request $request){
        $user = new User();
        $user->name=$request->nombre;
        $user->email=$request->correo;
        $user->password = Hash::make($request->contraseña);
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()->route('lideres.create')->with('agregar','ok');
    }

    public function lideres_edit(User $user){
        dd($user);
        return view('lideres.update');
    }
    public function lideres_update2(){

    }
}
