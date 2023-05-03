<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function index(){
        $productos = Producto::get();
        return view('Empleado.indexEmpleado')->with('productos',$productos);
    }

    public function crearProducto(){
        $categorias = Categoria::get();
        return view('Empleado.nuevoProducto')->with('categorias',$categorias);
    }

    public function guardarProducto(Request $request){
        $producto = new Producto();
        $producto->codigoProducto = $request->codigoProducto;
        $producto->nombre = $request->nombre;
        $producto->descripcion= $request->descripcion;
        //Imagenes
        if($request->hasFile('imagen')){
            $file =$request->file('imagen');
            $url = 'img/uploads/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSucces = $file->move($url,$filename);
            $producto->img = $url.$filename;
        }
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->existencias = $request->existencias;
        $producto->save();
        return redirect(route('empleado.index'))->with('veri',true);
    }

    public function actualizarProducto($id){
        $producto = Producto::find($id);
        $categorias = Categoria::get();
        return view('Empleado.actuProducto')->with('producto',$producto)->with('categorias',$categorias);
    }

    public function editarProducto(Request $request,$id){
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre; 
        $producto->descripcion= $request->descripcion;
        //Imagenes
        if($request->hasFile('imagen')){
            $file =$request->file('imagen');
            $url = 'img/uploads/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSucces = $file->move($url,$filename);
            $producto->img = $url.$filename;
        }
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->existencias = $request->existencias;
        $producto->save();
        return redirect(route('empleado.index'));
    }

    public function delProducto($id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect(route('empleado.index'));
    }
}
