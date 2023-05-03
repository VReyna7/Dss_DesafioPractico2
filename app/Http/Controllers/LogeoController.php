<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogeoController extends Controller
{
    //metodo de registro de cliente
    public function register_Cliente(Request $request){
      $credentials = request()->validate([
            'correo' => ['required','email','string'],
            'password' => ['required','string','min:7'],
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'apellido' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
      ]);

        $Usuario = new Usuario();
        $Usuario->nombre = $request->nombre;
        $Usuario->apellido = $request->apellido;
        $Usuario->email = $request->correo;
        $Usuario->password = Hash::make($request->password);
        $Usuario->role = $request->rol;
        $Usuario->save();

        Auth::login($Usuario);
        return redirect(route('cliente.index'));
    }

    public function login(Request $request){
            $credentials = [
                "email" => $request->email,
                "password" => $request->contrasena,
            ];
            if(Auth::attempt($credentials)){
              if(auth()->user()->role==3){
                return redirect(route('cliente.index'));
               }
              if(auth()->user()->role==2){
               return redirect(route('empleado.index'));
              }
              if(auth()->user()->role==1){
                return redirect(route('admin.index'));
              }
            }else{
                return redirect('login');
            }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
