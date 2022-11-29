<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function ModificarCliente(Request $request)
    {
        try
        {
            $request->validate([
                'codigo' => 'required',
                'nombre' => 'required',
                'apellidoPaterno' => 'required',
                'apellidoMaterno' => 'required',
                'celular' => 'required',
            ]);

            $consulta = Cliente::where('codigo', '=', $request->codigo)->first();
            $consulta->nombre = $request->nombre;
            $consulta->apellido_paterno = $request->apellidoPaterno;
            $consulta->apellido_materno = $request->apellidoMaterno;
            $consulta->celular = $request->celular;
            $consulta->save();

            $data = [
                'error' => false,
                'mensaje' => "Cliente modificado."
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
