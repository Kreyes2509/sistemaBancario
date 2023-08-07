<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aval;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class AvalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avales = DB::table('clientes')
        ->join('avales', 'clientes.id', '=', 'avales.clienteID')
        ->select('avales.*', DB::raw("CONCAT(clientes.nombres, ' ', clientes.apellido_paterno, ' ', clientes.apellido_materno) AS cliente"))
        ->get();

        $clientes = Cliente::all();

        return view('components.avales.avales',compact('avales','clientes'));
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
     *
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nombre_completo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
            'rfc' => 'required',
            'relacion_cliente' => 'required',
            'monto_avalado' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
        ]);

        $aval = new Aval();
        $aval -> nombre_completo = $request -> input('nombre_completo');
        $aval -> direccion = $request -> input('direccion');
        $aval -> telefono = $request -> input('telefono');
        $aval ->email = $request ->input('email');
        $aval ->rfc = $request ->input('rfc');
        $aval ->relacion_cliente = $request ->input('relacion_cliente');
        $aval ->monto_avalado = $request ->input('monto_avalado');
        $aval ->fecha_inicio = $request ->input('fecha_inicio');
        $aval ->fecha_finalizacion = $request ->input('fecha_finalizacion');
        $aval ->estado = "ACTIVO";
        $aval ->clienteID = $request ->input('clienteID');

        if($aval->save()){
            return redirect('/avales')->with('msg', 'añadido correctamente');
        }
        return redirect('/avales')->with('msg', 'ocurrio un error');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aval = Aval::find($id);

        if(!$aval){
            return response()->json([
                'message' => 'the aval does not exist',
                'status'=>500
            ]);
        }
        return response()->json([
            'message' => 'Aval info',
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
            'nombre_completo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
            'rfc' => 'required',
            'relacion_cliente' => 'required',
            'monto_avalado' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
        ]);

        $aval = Aval :: find($id);
        $aval ->nombre_completo = $request -> input('nombre_completo');
        $aval ->direccion = $request -> input('direccion');
        $aval ->telefono = $request -> input('telefono');
        $aval ->email = $request ->input('email');
        $aval ->rfc = $request ->input('rfc');
        $aval ->relacion_cliente = $request ->input('relacion_cliente');
        $aval ->monto_avalado = $request ->input('monto_avalado');
        $aval ->fecha_inicio = $request ->input('fecha_inicio');
        $aval ->fecha_finalizacion = $request ->input('fecha_finalizacion');
        $aval ->estado = $aval ->estado;
        $aval ->clienteID = $request ->input('clienteID');


        if($aval->save()){

            return redirect('/avales')->with('msg', 'actualizado correctamente');
        }
        return redirect('/avales')->with('msg', 'ocurrio un error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $aval = Aval::destroy($id);
        return redirect('/avales')->with('msg', 'eliminado correctamente');

    }
}
