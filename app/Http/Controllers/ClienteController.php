<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Categoria;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    public function index(){
        $productos = Producto::get();
        return view('Clientes.indexCliente')->with('productos',$productos);
    }

    public function carrito(){
            $total = 0;
            $carrito = Carrito::select('*')->join('productos','carrito.idProducto','=','productos.codigoProducto')->where('carrito.idCliente',Auth()->user()->id)->get();
            foreach($carrito as $precio){
                $total = $total+$precio->precio;
            }
            return view('Clientes.carrito')->with('carrito',$carrito)->with('total',$total);
    } 

    public function agregaCompra($id){
            //Se agrega al carrito
            $producto = new Carrito();
            $producto->idCliente = Auth()->user()->id;
            $producto->idProducto = $id;
            $producto->save();
            //se resta la cantidad a Productos
            $resta = Producto::find($id);
            $resta->existencias = $resta->existencias-1;
            $resta->save();
            return redirect(route('cliente.index'));
    }

    public function comprar(){
        $total = 0;
        $carrito = Carrito::select('*')->join('productos','carrito.idProducto','=','productos.codigoProducto')->where('carrito.idCliente',Auth()->user()->id)->get();
        foreach($carrito as $precio){
            $total = $total+$precio->precio;
        }
        $cantidad = Carrito::selectRaw('count(idCliente) as cantidad, idProducto')->where('idCliente',Auth()->user()->id)->groupBy('idProducto')->get();
        return view('Clientes.comprar')->with('carrito',$carrito)->with('total',$total)->with('cantidad',$cantidad);
    }

    public function borrarCarrito($id){
        //Se agrega la existencia a los productos
        $producto = Producto::find($id);
        $producto->existencias = $producto->existencias+1;
        $producto->save();
        //Se elimina del carrito
        $borrar = Carrito::where('idProducto',$id);
        $borrar->delete();
        return redirect(route('cliente.carrito'));
    }

    
    public function completar(Request $request){
        $credentials = request()->validate([
            'nombre' => ['required','string','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'telefono' => ['required','string','regex:/^[6,7][0-9]{3}-[0-9]{4}$/'],
            'Direccion' => ['required','string'],
            'tarjeta' => ['required','string','regex:/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/'],
            'cv' => ['required','string','regex:/^[0-9]{3}$/'],
            'fecha' => ['required']
        ]);

        foreach(json_decode($request->productos) as $productos){
            $venta = new Venta();
            $venta->idProducto = $productos->idProducto;
            $venta->idCliente = Auth()->user()->id;
            $venta->cantidad = $productos->cantidad;
            $fecha = new DateTime();
            $venta->fechaVenta = $fecha->format('Y-m-d');
            $venta->save();
            //Borrar los productos compradoscarrito
            $prod = Carrito::where('idCliente',Auth()->user()->id)->where('idProducto',$productos->idProducto);
            $prod->delete();
        }
        $info = $request->input();
        $prod = json_decode($request->productos);
        $pdf = Pdf::loadView('Compra.pdf',compact('prod'),compact('info'));
        return $pdf->stream();
    }
}
