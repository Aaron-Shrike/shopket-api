<?php

use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas API

//Ruta para iniciar sesion
Route::post('/iniciar-sesion', [UsuarioController::class, 'IniciarSesion']);

//Gestion de usuario/cliente
Route::post('/registrar-usuario', [UsuarioController::class, 'CrearUsuario']);
Route::post('/actualizar-usuario', [UsuarioController::class, 'ModificarUsuario']);
Route::post('/eliminar-usuario', [UsuarioController::class, 'EliminarUsuario']);

//Gestion de producto
Route::post('/productos', [ProductoController::class, 'ObtenerProductos']);
Route::post('/producto', [ProductoController::class, 'ObtenerProducto']);
Route::post('/registrar-producto', [ProductoController::class, 'CrearProducto']);
Route::post('/actualizar-producto', [ProductoController::class, 'ModificarProducto']);
Route::post('/eliminar-producto', [ProductoController::class, 'EliminarProducto']);

//Gestion de venta
Route::post('/ventas', [VentaController::class, 'ObtenerVentas']);
Route::post('/venta', [VentaController::class, 'ObtenerVenta']);
Route::post('/ventas-cliente', [VentaController::class, 'ObtenerVentasCliente']);
Route::post('/registrar-venta', [VentaController::class, 'CrearVenta']);
Route::post('/eliminar-venta', [VentaController::class, 'EliminarVenta']);

//Gestion de categoria
Route::post('/categorias-producto', [CategoriaProductoController::class, 'ObtenerCateoriasProducto']);
Route::post('/registrar-categoria', [CategoriaProductoController::class, 'CrearCategoriaProducto']);
Route::post('/modificar-categoria', [CategoriaProductoController::class, 'ModificarCategoriaProducto']);
Route::post('/eliminar-categoria', [CategoriaProductoController::class, 'EliminarCategoriaProducto']);

//Gestion de marca
Route::post('/marcas', [CategoriaProductoController::class, 'ObtenerMarca']);
Route::post('/registrar-marca', [CategoriaProductoController::class, 'CrearMarca']);
Route::post('/modificar-marca', [CategoriaProductoController::class, 'ModificarMarca']);
Route::post('/eliminar-marca', [CategoriaProductoController::class, 'EliminarMarca']);