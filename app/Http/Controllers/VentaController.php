<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    //
    public function ObtenerVentas(Request $request)
    {  
        try
        {
            $consulta =  Venta::select('codigo','fecha','igv','total_gravado as totalGravado',
                    'total_no_gravado as totalNoGravado')
                    ->orderBy('fecha', 'DESC')
                    ->get();

            $data = [
                'error' => false,
                'mensaje' => '',
                'datos' => $consulta
            ];
            
            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ObtenerVenta(Request $request)
    {  
        try
        {
            $request->validate([
                'codigoVenta' => 'required',
            ]);

            $consulta =  Venta::select('metodo_pago as metodoPago','fecha','igv','total_gravado as totalGravado',
                    'total_no_gravado as totalNoGravado', 'codigo_cliente', 'nombre', 'apellido_paterno',
                    'apellido_materno')
                    ->join('cliente', 'venta.codigo_cliente', '=', 'cliente.codigo')
                    ->where('codigo_venta', '=', $request->codigoVenta)
                    ->first();

            $data = [
                'error' => false,
                'mensaje' => '',
                'datos' => $consulta
            ];
            
            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function ObtenerVentasCliente(Request $request)
    {  
        try
        {
            $request->validate([
                'codigoCliente' => 'required',
            ]);

            $consulta =
                Venta::select('codigo','metodo_pago as metodoPago','fecha','igv','total_gravado as totalGravado',
                    'total_no_gravado as totalNoGravado')
                    ->where('codigo_cliente', '=', $request->codigoCliente)
                    ->where('vigente', '=', '1')
                    ->orderBy('fecha', 'DESC')
                    ->get();

            $data = [
                'error' => false,
                'mensaje' => 'Se encontraron las compras del cliente',
                'datos' => $consulta
            ];
            
            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }
    
    public function CrearVenta(Request $request)
    {
        //
        DB::beginTransaction();

        try
        {
            $request->validate([
                'metodoPago' => 'required',
                'igv' => 'required',
                'totalGravado' => 'required',
                'totalNoGravado' => 'required',
                'codigoCliente' => 'required',

                'productos' => 'required',
            ]);
            
            $obj = new Venta();
            $obj->metodo_pago = $request->metodoPago;
            $obj->fecha = now();
            $obj->igv = $request->igv;
            $obj->total_gravado = $request->totalGravado;
            $obj->total_no_gravado = $request->totalNoGravado;
            $obj->vigente = 1;
            $obj->codigo_cliente = $request->codigoCliente;
            $obj->save();

            $codigo_venta = $obj->codigo;
            $productos = $request->productos;

            foreach($productos as $producto)
            {
                $consulta = Producto::select('precio','igv','afecta_igv', 'stock')
                    ->where('codigo','=', $producto['codigo'])
                    ->first();

                $obj1 = new DetalleVenta();
                $obj1->cantidad = $producto['cantidad'];
                $obj1->precio = $consulta->precio;
                $obj1->igv = $consulta->igv;
                $obj1->afecta_igv = $consulta->afecta_igv;
                $obj1->codigo_venta = $codigo_venta;
                $obj1->codigo_producto = $producto['codigo'];
                $obj1->save();

                if($consulta->stock >= $producto['cantidad'])
                {
                    $consulta->stock -= $producto['cantidad'];
                    $consulta->save();
                }
                else
                {
                    throw new Exception('Stock insuficiente.');
                }
            }

            DB::commit();

            $data = [
                'error' => false,
                'mensaje' => "Venta registrada.",
                'datos' => [],
            ];
            
            return response($data);
        }
        catch (\Exception $ex) 
        {
            DB::rollback();
            $data = $ex->getMessage();
            
            return response($data, 400);
        }
    }

    public function EliminarVenta(Request $request)
    {
        //
        try
        {
            $request->validate([
                'codigoVenta' => 'required',
            ]);
            
            $obj = new Venta();
            $obj->vigente = 0;
            $obj->save();

            $data = [
                'error' => false,
                'mensaje' => "",
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
