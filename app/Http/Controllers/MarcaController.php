<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    //
    public function ObtenerMarcas()
    {
        try
        {
            $consulta = Marca::select('codigo', 'nombre')
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

    public function ObtenerMarca(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = Marca::select('codigo', 'nombre', 'vigente')
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

    public function CrearMarca(Request $request)
    {
        try
        {
            $request->validate([
                'nombre' => 'required',
            ]);

            $obj = new Marca();
            $obj->nombre = $request->nombre;
            $obj->vigente = 1;
            $obj->save();

            $data = [
                'error' => false,
                'mensaje' => "Marca registrada."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ModificarMarca(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
                'nombre' => 'required',
            ]);

            $consulta = Marca::where('codigo', '=', $request->codigo)->first();
            $consulta->nombre = $request->nombre;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Marca modificada."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function EliminarMarca(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = Marca::where('codigo', '=', $request->codigo)->first();
            $consulta->vigente = 0;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Marca eliminada."
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
