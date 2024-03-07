<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function user_create(){
        
        $roles = Role::pluck('name','name')->all();
        return view('user.create', ['roles'=> $roles]);
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
        $user->password = Hash::make($request->contraseña);
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()->route('user.create')->with('agregar','ok');
    }

    public function user_edit($user_id){
        
        $user = User::find($user_id);
        $roles = Role::pluck('name','name')->all();
        $userRole =$user->roles->pluck('name','name')->all();

        return view('user.update',[
            'user'=> $user,
            'roles'=> $roles,
            'userRole'=> $userRole,
        ]);
    }
    public function user_update(Request $request, User $user){
        $data =[
            'name' => $request->nombre,
            'email' => $request->correo,
        ];
        if (!empty($request->contraseña)) {
            $data +=[
                'password' => Hash::make($request->password),
            ];
        }
        $user->update($data);

        $user->syncRoles($request->roles);

        return redirect()->route('user.read')->with('agregar','ok');
    }

    public function user_delete(User $user){
        $user->delete();

        return redirect()->route('user.read');
    }
}
