<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    public function index(){
        $empleados = Usuario::where('role', 2)->get();
        return view('Administrador.indexAdministrador',compact('empleados'));
    }

    public function CategoriasCrud(){
        $categorias = Categoria::get();
        return view('Administrador.crudCategoria',compact('categorias'));
    }

    public function adminCrud(){
        $admins = Usuario::where('role', 1)->get();
        return view('Administrador.crudAdmin',compact('admins'));
    }


    //CRUD EMPLEADO 
    public function insertEmpleado(Request $request){
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

        return redirect(route('admin.index'));
    }

    public function updateEmpleado(Request $request,$id){
        $credentials = request()->validate([
            'correo' => ['required','email','string'],
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'apellido' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
      ]);

        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->correo;
        $usuario->save();
        return redirect(route('admin.index'));
    }

    public function deleteEmpleado($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect(route('admin.index'));
    }

    //FIN CRUD EMPLEADO


    //CRUD CATEGORIAS
    public function insertCategoria(Request $request){
        $credentials = request()->validate([
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
      ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect(route('CategoriasCrud'));
    }

    public function updateCategoria(Request $request,$id){
        $credentials2 = request()->validate([  
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
      ]);

        $usuario = Categoria::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->save();
        return redirect(route('CategoriasCrud'));
    }

    public function deleteCategoria($id){
        $usuario = Categoria::find($id);
        $usuario->delete();
        return redirect(route('CategoriasCrud'));
    }
    //FIN CRUD CATEGORIAS

    //CRUD admin
    public function insertAdmin(Request $request){
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

        return redirect(route('AdminCrud'));
    }

    public function updateAdmin(Request $request,$id){
        $credentials = request()->validate([
            'correo' => ['required','email','string'],
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'apellido' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
      ]);

        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->correo;
        $usuario->save();
        return redirect(route('AdminCrud'));
    }

    public function deleteAdmin($id){
        if(auth()->user()->id==$id){
            return redirect()->route('AdminCrud')->with('success', 'No te puedes eliminar tu solo.');
        }else{
            $usuario = Usuario::find($id);
            $usuario->delete();
            return redirect(route('AdminCrud'));
        }
    }
    //FIN CRUD ADMIN

}
