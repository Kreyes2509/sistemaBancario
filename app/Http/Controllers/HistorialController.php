<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historialprestamo;
use App\Http\Controllers\PrestamosController;
use App\Models\ClienteCobrador;
use App\Models\Prestamo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class HistorialController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = DB::table('prestamos')
                       ->join('historialprestamo', 'prestamos.id', '=', 'historialprestamo.prestamoID')
                       ->select('prestamos.*')
                       ->get();
    }

    public function getLoanHistory($id)
    {
        $historal = DB::table('prestamos')
        ->join('historialprestamo', 'prestamos.id', '=', 'historialprestamo.prestamoID')
        ->select('prestamos.*','historialprestamo.*', 'historialprestamo.id AS histoID')->where('historialprestamo.prestamoID','=',$id)
        ->get();

        $historialCliente = DB::table('prestamos')
        ->join('historialprestamo', 'prestamos.id', '=', 'historialprestamo.prestamoID')
        ->select('prestamos.*','historialprestamo.*', 'historialprestamo.id AS histoID')->where('historialprestamo.prestamoID','=',$id)
        ->first();

        foreach($historal as $row)
        {
            if(Carbon::now() > $row->fechaVencimiento && $row->estado_pago == 'PENDIENTE')
            {
                $historalPrestamo = Historialprestamo::find($row->histoID);
                $historalPrestamo->estado_pago = 'PAGO ATRASADO';
                $historalPrestamo->save();
            }
        }

        $validarcliCobrador = ClienteCobrador::where('cliente_cobrador.clienteID','=',$historialCliente->clienteID)->count();


        $habilitarBotonCobrador = Historialprestamo::select('prestamos.*','historialprestamo.*', 'historialprestamo.id AS histoID')
                    ->join('prestamos', 'prestamos.id', '=', 'historialprestamo.prestamoID')
                    ->where('historialprestamo.prestamoID','=',$id)->where('historialprestamo.estado_pago','=','PAGO ATRASADO')
                    ->count();

        if($validarcliCobrador >= 1)
        {
            $habilitarBotonCobrador = 0;
        }


        $cobradores = DB::table('users')
                    ->join('cobradores', 'users.id', '=', 'cobradores.userID')
                    ->select('users.*', 'cobradores.sueldo', 'cobradores.telefono', 'cobradores.email_empresa')
                    ->where('users.rolId','=',3)
                    ->get();

        $cliente =  Historialprestamo::select('prestamos.*','historialprestamo.*', 'historialprestamo.id AS histoID','clientes.id AS clienteID')
                                ->join('prestamos', 'prestamos.id', '=', 'historialprestamo.prestamoID')
                                ->join('clientes','clientes.id','=','prestamos.clienteID')
                                ->where('historialprestamo.prestamoID','=',$id)
                                ->first();

        $idCliente = $cliente->clienteID;

        return view('components.historialprestamos.hitorial',compact('historal','habilitarBotonCobrador','cobradores','idCliente'));
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
    public function addHistorialPrestamo($id)
    {

        $prestamo = Prestamo::findOrFail($id);
        $historial = new Historialprestamo();

        $fechaString = $prestamo->fecha_aprobacion; // Assuming this is a valid date string in the format dd/mm/yyyy

        $fecha = Carbon::createFromFormat('Y-m-d', $fechaString);
        $fechaFormateada = $fecha->format('Y-m-d'); // Convert to the format yyyy-mm-dd
        $fechafinal = $fecha->copy()->addMonths(1); // Add one month to the original date

        $numeroMes = $fechafinal->month;

        Carbon::setLocale('es');

        $nombreMes = $fechafinal->formatLocalized('%B');

        $historial->periodo = $nombreMes;
        $historial->folio = rand(1000, 1000000);
        $historial->total = $prestamo->cuota;
        $historial->fechaVencimiento = $fechafinal;
        $historial->estado_pago = 'PENDIENTE';
        $historial->prestamoID = $prestamo->id;

        $historial->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
