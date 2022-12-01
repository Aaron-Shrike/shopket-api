<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function ObtenerProductos()
    {
        try
        {
            $consulta = Producto::select('codigo', 'nombre', 'url_imagen as urlImagen', 'precio', 'stock')
                    ->where('vigente', '=', 1)
                    ->get();
            
            $data = [
                'error' => false,
                'datos' => $consulta,
                'mensaje' => ""
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ObtenerProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = Producto::select('codigo', 'nombre', 'presentacion', 'url_imagen as urlImagen', 
                    'precio', 'igv', 'afecta_igv as afectaIgv', 'stock', 'stock_minimo as stockMinimo',
                    'codigo_marca as marca', 'codigo_categoria as categoria', 'vigente')
                    ->where('vigente', '=', 1)
                    ->first();
            
            $data = [
                'error' => false,
                'datos' => $consulta,
                'mensaje' => ""
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function CrearProducto(Request $request)
    {
        try
        {
            $request->validate([
                'nombre' => 'required',
                'presentacion' => 'required',
                'urlImagen' => 'required',
                'precio' => 'required',
                'igv' => 'required',
                'afectaIgv' => 'required',
                'stock' => 'required',
                'stockMinimo' => 'required',
                'codigoMarca' => 'required',
                'codigoCategoria' => 'required',
            ]);

            $obj = new Producto();
            $obj->nombre = $request->nombre;
            $obj->presentacion = $request->presentacion;
            $obj->url_imagen = $request->urlImagen;
            $obj->precio = $request->precio;
            $obj->igv = $request->igv;
            $obj->afecta_igv = $request->afectaIgv;
            $obj->stock = $request->stock;
            $obj->stock_minimo = $request->stockMinimo;
            $obj->codigo_marca = $request->codigoMarca;
            $obj->codigo_categoria = $request->codigoCategoria;
            $obj->vigente = 1;
            $obj->save();

            $data = [
                'error' => false,
                'mensaje' => "Producto registrado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ModificarProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
                'nombre' => 'required',
                'presentacion' => 'required',
                'urlImagen' => 'required',
                'precio' => 'required',
                'igv' => 'required',
                'afectaIgv' => 'required',
                'stockMinimo' => 'required',
                'codigoMarca' => 'required',
                'codigoCategoria' => 'required',
            ]);

            $consulta = Producto::where('codigo', '=', $request->codigo)->first();
            $consulta->nombre = $request->nombre;
            $consulta->presentacion = $request->presentacion;
            $consulta->url_imagen = $request->urlImagen;
            $consulta->precio = $request->precio;
            $consulta->igv = $request->igv;
            $consulta->afecta_igv = $request->afectaIgv;
            $consulta->stock_minimo = $request->stockMinimo;
            $consulta->codigo_marca = $request->codigoMarca;
            $consulta->codigo_categoria = $request->codigoCategoria;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Producto modificado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function EliminarProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = Producto::where('codigo', '=', $request->codigo)->first();
            $consulta->vigente = 0;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Producto eliminado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }
}
