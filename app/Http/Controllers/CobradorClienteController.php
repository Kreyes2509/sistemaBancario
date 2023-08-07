<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ClienteCobrador;
use App\Models\Cobrador;
use App\Models\Aval;
use App\Models\Cliente;
use App\Models\Historialprestamo;
use App\Http\Controllers\PrestamosController;
use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;

class CobradorClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function storeClientCollecting(Request $request,$id)
    {
        $clienteCobrador = new ClienteCobrador();
        $clienteCobrador->clienteID = $id;
        $clienteCobrador->cobradorID = $request->input('cobrador');
        if($clienteCobrador->save())
        {
            return  back()->with('msg', 'añadido correctamente');
        }

        return  back()->with('msg', 'ocurrio un error');
    }

    public function showAvales($id)
    {
        $avales = DB::table('clientes')
        ->join('avales', 'clientes.id', '=', 'avales.clienteID')
        ->select('avales.*')->where('clientes.id','=',$id)
        ->get();

        return view('components.cobradorCliente.mostraravales',compact('avales'));
    }

    public function showPrestamos($id)
    {
        $prestamos = DB::table('clientes')
        ->join('prestamos', 'clientes.id', '=', 'prestamos.clienteID')
        ->select('prestamos.*', 'clientes.*','prestamos.id AS prestamoID')
        ->where('prestamos.clienteID','=',$id)
        ->get();

        return view('components.cobradorCliente.mostrarprestamo',compact('prestamos'));
    }

    public function showHistorialPrestamo($id)
    {
        $historal = DB::table('prestamos')
        ->join('historialPrestamo', 'prestamos.id', '=', 'historialPrestamo.prestamoID')
        ->select('prestamos.*','historialPrestamo.*', 'historialPrestamo.id AS histoID')->where('historialPrestamo.prestamoID','=',$id)
        ->get();

        return view('components.cobradorCliente.mostrarhistorialprestamo',compact('historal'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                $clientesCobrador = ClienteCobrador::select('clientes.*','cobradores.*','clientes.id AS clienteID')->join('clientes','clientes.id','=','cliente_cobrador.clienteID')
                            ->join('cobradores','cobradores.userID','=','cliente_cobrador.cobradorID')
                            ->join('users','users.id','=','cobradores.userID')
                            ->where('users.id','=',$id)
                            ->get();

        return view('components.cobradorCliente.clientecobrador',compact('clientesCobrador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
