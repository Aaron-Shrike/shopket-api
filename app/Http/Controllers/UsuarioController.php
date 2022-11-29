<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //Inicio de sesion con correo y contrasenia
    public function IniciarSesion(Request $request)
    {
        try
        {
            $request->validate([
                'correo' => 'required',
                'contrasenia' => 'required',
            ]);
            
            $data=array();

            $consulta = Usuario::select('correo', 'contrasenia','tipo')
                            ->where('correo','=',$request->dni)
                            ->first();

            if(isset($consulta['correo']))
            {
                if(Hash::check($request->contrasenia, $consulta['contrasenia']))
                {
                    $consulta1 = 
                        Cliente::select('codigo','nombre', 'apellido_paterno AS apellidoPaterno', 
                            'apellido_materno AS apellidoMaterno', 'dni', 'celular',
                            'url_imagen')
                        ->where('correo','=',$request->correo)
                        ->where('vigente','=','1')
                        ->first();

                    $consulta1[] = $consulta['tipo'];

                    $data = [
                        'error' => false,
                        'datos' => $consulta1,
                        'mensaje' => ""
                    ];
                }
                else
                {
                    $data = [
                        'error' => true,
                        'mensaje' => "Credenciales incorrectas."
                    ];
                }
            }
            else
            {
                $data = [
                    'error' => false,
                    'mensaje' => "Usuario no registrado."
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

    public function CrearUsuario(Request $request)
    {
        DB::beginTransaction();

        try
        {
            $request->validate([
                'nombre' => 'required',
                'apellidoPaterno' => 'required',
                'apellidoMaterno' => 'required',
                'dni' => 'required',
                'celular' => 'required',
                // 'imagen' => 'required',
                'correo' => 'required',
                'contrasenia' => 'required',
            ]);

            $obj = new Cliente();
            $obj->correo = $request->correo;
            $obj->contrasenia = Hash::make($request->contrasenia);
            $obj->tipo = "CLI";
            $obj->vigente = 1;
            $obj->save();

            $obj1 = new Usuario();
            $obj1->nombre = $request->nombre;
            $obj1->apellido_paterno = $request->apellidoPaterno;
            $obj1->apellido_materno = $request->apellidoMaterno;
            $obj1->dni = $request->dni;
            $obj1->celular = $request->celular;
            $obj1->url_imagen = "imagen.jpg";
            $obj1->vigente = 1;
            $obj1->codigo_cliente = $obj->codigo;
            $obj1->save();

            DB::commit();

            $data = [
                'error' => false,
                'mensaje' => "Usuario registrado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            DB::rollback();
            
            return response($data, 400);
        }
    }

    public function ModificarUsuario(Request $request)
    {
        DB::beginTransaction();

        try
        {
            $request->validate([
                'codigo' => 'required',
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'celular' => 'required',
                // 'imagen' => 'required',
                'contrasenia' => 'required',
            ]);

            $consulta = Cliente::where('codigo', '=', $request->codigo)->first();
            $consulta->nombre = $request->nombre;
            $consulta->apellido_paterno = $request->apellidoPaterno;
            $consulta->apellido_materno = $request->apellidoMaterno;
            $consulta->celular = $request->celular;
            $consulta->save();

            $consulta1 = Usuario::where('codigo_cliente', '=', $request->codigo)->first();
            $consulta1->contrasenia = Hash::make($request->contrasenia);
            $consulta1->save();

            DB::commit();

            $data = [
                'error' => false,
                'mensaje' => "Usuario modificado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            DB::rollback();
            
            return response($data, 400);
        }
    }

    public function EliminarUsuario(Request $request)
    {
        DB::beginTransaction();

        try
        {
            $request->validate([
                'codigo' => 'required',
            ]);

            $consulta = Cliente::where('codigo', '=', $request->codigo)->first();
            $consulta->vigente = 0;
            $consulta->save();

            $consulta1 = Usuario::where('codigo_cliente', '=', $request->codigo)->first();
            $consulta1->vigente = 0;
            $consulta1->save();

            DB::commit();

            $data = [
                'error' => false,
                'mensaje' => "Usuario eliminado."
            ];

            return response($data);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            DB::rollback();
            
            return response($data, 400);
        }
    }
}
