<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('components.clientes.clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request -> validate([

            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'nombres' => 'required',
            'numero_exterior' => 'required',
            'codigo_postal' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
            'empleo_actual' => 'required',
            'sueldo'=> 'required',
            'nombre_empresa' => 'required',
            'antiguedad' => 'required',
            'telefono_empresa' => 'required|max:10',
            'direccion_empresa' => 'required',
            'situacion_buro' => 'required'
        ]);

        $cliente = new Cliente();
        $cliente -> apellido_paterno = $request -> input('apellido_paterno');
        $cliente -> apellido_materno = $request -> input('apellido_materno');
        $cliente -> nombres = $request -> input('nombres');
        $cliente -> direccion = $request -> input('direccion');
        $cliente -> numero_exterior = $request -> input('numero_exterior');
        $cliente -> codigo_postal = $request -> input('codigo_postal');
        $cliente -> ciudad = $request -> input('ciudad');
        $cliente -> estado = $request -> input('estado');
        $cliente -> telefono = $request -> input('telefono');
        $cliente -> email = $request -> input('email');
        $cliente -> empleo_actual = $request -> input('empleo_actual');
        $cliente -> sueldo = $request -> input('sueldo');
        $cliente -> nombre_empresa = $request -> input('nombre_empresa');
        $cliente -> antiguedad = $request -> input('antiguedad');
        $cliente -> telefono_empresa = $request -> input('telefono_empresa');
        $cliente -> direccion_empresa = $request -> input('direccion_empresa');
        $cliente -> situacion_buro = $request -> input('situacion_buro');

        if($cliente -> save())
        {
            return redirect('/clientes')->with('msg', 'añadido correctamente');
        }
        return redirect('/clientes')->with('msg', 'ocurrio un error');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente:: find($id);

        if(!$cliente)
        {
            return response()->json([
                'message' => 'the client does not exist',
                'status'=>500
            ]);
        }

        return response()->json([
            'message' => 'Client info',
            'data'=>$cliente,
            'status'=>200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([

            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'nombres' => 'required',
            'numero_exterior' => 'required',
            'codigo_postal' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
            'empleo_actual' => 'required',
            'sueldo'=> 'required',
            'nombre_empresa' => 'required',
            'antiguedad' => 'required',
            'telefono_empresa' => 'required|max:10',
            'direccion_empresa' => 'required',
            'situacion_buro' => 'required'
        ]);

        $cliente = Cliente :: find($id);
        $cliente -> apellido_paterno = $request -> input('apellido_paterno');
        $cliente -> apellido_materno = $request -> input('apellido_materno');
        $cliente -> nombres = $request -> input('nombres');
        $cliente -> direccion = $request -> input('direccion');
        $cliente -> numero_exterior = $request -> input('numero_exterior');
        $cliente -> codigo_postal = $request -> input('codigo_postal');
        $cliente -> ciudad = $request -> input('ciudad');
        $cliente -> estado = $request -> input('estado');
        $cliente -> telefono = $request -> input('telefono');
        $cliente -> email = $request -> input('email');
        $cliente -> empleo_actual = $request -> input('empleo_actual');
        $cliente -> sueldo = $request -> input('sueldo');
        $cliente -> nombre_empresa = $request -> input('nombre_empresa');
        $cliente -> antiguedad = $request -> input('antiguedad');
        $cliente -> telefono_empresa = $request -> input('telefono_empresa');
        $cliente -> direccion_empresa = $request -> input('direccion_empresa');
        $cliente -> situacion_buro = $request -> input('situacion_buro');

        if($cliente -> save())
        {
            return redirect('/clientes')->with('msg', 'actualizado correctamente');
        }
        return redirect('/clientes')->with('msg', 'ocurrio un error');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::destroy($id);

        return redirect('/clientes')->with('msg', 'eliminado correctamente');
    }


    public function getSalary($id)
    {
        $cliente = Cliente::where('id','=',$id)->get();

        return response()->json($cliente);
    }


}
