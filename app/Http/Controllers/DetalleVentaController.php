<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    //
    public function ObtenerDetalleVenta(Request $request)
    {  
        try
        {
            $request->validate([
                'codigoVenta' => 'required',
            ]);

            $consulta =
                DetalleVenta::select('cantidad', 'precio', 'igv', 'afecta_igv')
                    ->where('codigo_venta', '=', $request->codigoVenta)
                    ->get();

            $data = array();

            if(!($consulta->isEmpty()))
            {
                $data = [
                    'error' => false,
                    'mensaje' => 'Se encontraron los detalles de la venta',
                    'datos' => $consulta
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'mensaje' => "La venta no ha sido registrada o no tiene detalles"
                ];
            }

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }
}
