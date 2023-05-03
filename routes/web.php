<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogeoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('register');
})->name('registro');


/*Route::get('/Cliente/Index', function () {
    return view('Clientes/indexCliente');
})->name('Cliente.view.index');*/

//Creacion de ruta que ejecuta la creacion de cuentas de Cliente
Route::post('/validar-registro-Cliente',[LogeoController::class,'register_Cliente'])->name('validar-registro');

//Creacion de ruta que ejecuta el inicio de sesion para todo tipo roles
Route::post('/iniciar-sesion',[LogeoController::class,'login'])->name('iniciar-Sesion');

//Creacion de rutaspara el deslogeo
Route::get('/logout',[LogeoController::class,'logout'])->name('logout');

//Creacion de ruta para  uso del metodo index del admin.
Route::get('/admin',[AdminController::class,'index'])->middleware('auth.admin')->name('admin.index');

//Creacion de ruta para el  uso del metodo  index de empleado
Route::get('/empleado',[EmpleadoController::class,'index'])->middleware('auth.empleado')->name('empleado.index');

//creacion de ruta para el uso del metodo index cliente
Route::get('/cliente',[ClienteController::class,'index'])->middleware('auth.cliente')->name('cliente.index');


//creacion de ruta para el uso del metodo CRUD Categorias
Route::get('/admin/categorias',[AdminController::class,'CategoriasCrud'])->middleware('auth.admin')->name('CategoriasCrud');
//creacion de ruta para el uso del metodo CRUD admin
Route::get('/admin/administradores',[AdminController::class,'adminCrud'])->middleware('auth.admin')->name('AdminCrud');


//creacion de rutas par el  crud de la tabla usuarios, rol empleado - opciones Adminsitrador
Route::post('/admin/insertEmpleado',[AdminController::class,'insertEmpleado'])->middleware('auth.admin')->name('registro-empleado');
Route::get('/admin/deleteEmpleado/{id}',[AdminController::class,'deleteEmpleado'])->middleware('auth.admin');
Route::put('/admin/editEmpleado/{id}',[AdminController::class,'updateEmpleado'])->middleware('auth.admin')->name('editar-empleado');

//creacion de rutas par el  crud de la tabla categoria - opciones Adminsitrador
Route::post('/admin/insertCategoria',[AdminController::class,'insertCategoria'])->middleware('auth.admin')->name('registro-categoria');
Route::get('/admin/deleteCategoria/{id}',[AdminController::class,'deleteCategoria'])->middleware('auth.admin')->name('eliminar-categoria');
Route::put('/admin/editCategoria/{id}',[AdminController::class,'updateCategoria'])->middleware('auth.admin')->name('editar-categoria');

//creacion de rutas par el  crud de la tabla categoria - opciones Adminsitrador
Route::post('/admin/insertAdmin',[AdminController::class,'insertAdmin'])->middleware('auth.admin')->name('registro-Admin');
Route::get('/admin/deleteAdmin/{id}',[AdminController::class,'deleteAdmin'])->middleware('auth.admin')->name('eliminar-Admin');
Route::put('/admin/editAdmin/{id}',[AdminController::class,'updateAdmin'])->middleware('auth.admin')->name('editar-Admin');

//Creacion de rutas para el empleado
Route::get('/empleado',[EmpleadoController::class,'index'])->middleware('auth.empleado')->name('empleado.index');
Route::get('/empleado/crearProducto',[EmpleadoController::class,'crearProducto'])->middleware('auth.empleado')->name('empleado.crear');
Route::post('/empleado/guardarProducto',[EmpleadoController::class,'guardarProducto'])->middleware('auth.empleado')->name('empleado.guardar');
Route::get('/empleado/editarProducto/{id}',[EmpleadoController::class,'actualizarProducto'])->middleware('auth.empleado')->name('empleado.editar');
Route::put('/empleado/updateProducto/{id}',[EmpleadoController::class,'editarProducto'])->middleware('auth.empleado')->name('empleado.actualizar');
Route::get('/empleado/delete/{id}',[EmpleadoController::class,'delProducto'])->middleware('auth.empleado')->name('empleado.borrar');

//Creacion de rutas para el cliente
Route::get('/cliente',[ClienteController::class,'index'])->middleware('auth.cliente')->name('cliente.index');
Route::get('/cliente/carrito',[ClienteController::class,'carrito'])->middleware('auth.cliente')->name('cliente.carrito');
Route::get('/cliente/agregar/{id}',[ClienteController::class,'agregaCompra'])->middleware('auth.cliente')->name('cliente.agregar');
Route::get('/cliente/borrar/{id}',[ClienteController::class,'borrarCarrito'])->middleware('auth.cliente')->name('cliente.borrar');
Route::get('/cliente/comprar/',[ClienteController::class,'comprar'])->middleware('auth.cliente')->name('cliente.comprar');
Route::get('/cliente/completarCompra/',[ClienteController::class,'completar'])->middleware('auth.cliente')->name('cliente.completar');
