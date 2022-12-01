<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    //
    public function ObtenerCategoriasProducto()
    {
        try
        {
            $consulta = CategoriaProducto::select('codigo', 'nombre')
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

    public function ObtenerCategoriaProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = CategoriaProducto::select('codigo', 'nombre', 'vigente')
                    ->where('codigo', '=', $request->codigo)
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

    public function CrearCategoriaProducto(Request $request)
    {
        try
        {
            $request->validate([
                'nombre' => 'required',
            ]);

            $obj = new CategoriaProducto();
            $obj->nombre = $request->nombre;
            $obj->vigente = 1;
            $obj->save();

            $data = [
                'error' => false,
                'mensaje' => "Categoria de producto registrada."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ModificarCategoriaProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
                'nombre' => 'required',
            ]);

            $consulta = CategoriaProducto::where('codigo', '=', $request->codigo)->first();
            $consulta->nombre = $request->nombre;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Categoria de producto modificada."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function EliminarCategoriaProducto(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = CategoriaProducto::where('codigo', '=', $request->codigo)->first();
            $consulta->vigente = 0;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Categoria de producto eliminada."
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
