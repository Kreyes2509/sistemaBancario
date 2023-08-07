<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\CodesController;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $HistorialController;

    public function __construct()
    {
        $this->HistorialController = app(HistorialController::class);
    }


    public function index()
    {
        $prestamos = DB::table('clientes')
                 ->join('prestamos', 'clientes.id', '=', 'prestamos.clienteID')
                 ->select('prestamos.*', 'clientes.*','prestamos.id AS prestamoID')
                 ->get();

        $clientes = Cliente::all();

        return view('components.Prestamos.prestamos',compact('prestamos','clientes'));
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
            'monto_prestamo' => 'required',
            'plazo_pago' => 'required',
            'metodo_pago' => 'required',
            'tipo_prestamo' => 'required',
            'garantia' => 'required',
            'cliente' => 'required'
        ]);

        $validarPrestamo = Prestamo::where('estado_prestamo','=','ACTIVO')
                                    ->where('clienteID','=',$request -> input('cliente'))->count();

        if($validarPrestamo == 2)
        {
            return redirect('/prestamos')->with('msg', 'la persona ya no puede realizar un prestamo');
        }

        $validarAval = Cliente::select('clientes.*')->join('avales','avales.clienteID','=','clientes.id')
                                ->where('clientes.id','=',$request -> input('cliente'))->count();

        if($validarAval < 1 && $request -> input('tipo_prestamo') == 'Hipotecario')
        {
            return redirect('/prestamos')->with('msg', 'no tienes avales');
        }
        if($validarAval < 1 && $request -> input('tipo_prestamo') == 'Automotriz')
        {
            return redirect('/prestamos')->with('msg', 'no tienes avales');
        }
        $monto_prestamo = $request->input('monto_prestamo');
        $tasa_interes =  0.01666;
        $plazo_pago = $request ->input('plazo_pago');

        $denominator = pow(1 + $tasa_interes, -$plazo_pago);
        $cuota = ($monto_prestamo * $tasa_interes) / (1 - $denominator);

        $prestamo = new Prestamo();
        $prestamo->monto_prestamo = $monto_prestamo;
        $prestamo->tasa_interes = $tasa_interes;
        $prestamo->plazo_pago = $plazo_pago;
        $fechaCarbon = Carbon::parse(Carbon::now());
        $fechaRestada = $fechaCarbon->subDay();
        $prestamo->fecha_solicitud = Carbon::now();
        $prestamo->metodo_pago = $request -> input('metodo_pago');
        $prestamo->cuota = $cuota;
        $prestamo->tipo_prestamo = $request -> input('tipo_prestamo');
        $prestamo->garantia = $request -> input('garantia');
        $prestamo->clienteID = $request -> input('cliente');



        if($prestamo->save()){
            return redirect('/prestamos')->with('msg', 'añadido correctamente');
        }
        return redirect('/prestamos')->with('msg', 'ocurrio un error');
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
    public function update(Request $request, $id)
    {
        $validarburo = Prestamo::select('clientes.*','prestamos.*')->join('clientes','clientes.id','=','prestamos.clienteID')
                                ->where('prestamos.id','=',$id)->first();

        if($validarburo->situacion_buro == 'bueno')
        {
            $prestamo = Prestamo :: find($id);
            $fechaCarbon = Carbon::parse(Carbon::now());
            $fechaRestada = $fechaCarbon->subDay();
            $prestamo->fecha_aprobacion = Carbon::now();
            $prestamo->estado_prestamo = 'ACTIVO';
            $prestamo->save();
            if($prestamo -> save()){
                $this->HistorialController->addHistorialPrestamo($id);
                return redirect('/prestamos')->with('msg', 'prestamo autorizado');
            }

            return redirect('/prestamos')->with('msg', 'ocurrio un error');
        }
        return redirect('/prestamos')->with('msg', 'no esta autorizado para sacar un prestamo');
    }

    public function rejectLoan($id)
    {
        $prestamo = Prestamo :: find($id);
        $fechaCarbon = Carbon::parse(Carbon::now());
        $fechaRestada = $fechaCarbon->subDay();
        $prestamo->fecha_aprobacion = 'rechazado';
        $prestamo->estado_prestamo = 'RECHAZADO';
        $prestamo->fecha_aprobacion = null;
        $prestamo->save();

        if($prestamo -> save()){
            return redirect('/prestamos')->with('msg', 'prestamo rechazado');
        }

        return redirect('/prestamos')->with('msg', 'ocurrio un error');
    }

    public function getPrestamoClient($id)
    {
        $prestamos = DB::table('clientes')
        ->join('prestamos', 'clientes.id', '=', 'prestamos.clienteID')
        ->select('prestamos.*', 'clientes.*','prestamos.id AS prestamoID')
        ->where('prestamos.clienteID','=',$id)
        ->get();

        if(!$prestamos)
        {
            return response()->json([
                'message' => 'el cliente no tiene prestamos',
                'status'=>500
            ]);
        }

        return response()->json([
            'message' => 'prestamos',
            'data'=>$prestamos,
            'status'=>200
        ]);
    }

    public function ApiHistorialPrestamo($id)
    {
        $historal = DB::table('prestamos')
        ->join('historialPrestamo', 'prestamos.id', '=', 'historialPrestamo.prestamoID')
        ->select('prestamos.*','historialPrestamo.*', 'historialPrestamo.id AS histoID')->where('historialPrestamo.prestamoID','=',$id)
        ->get();

        if(!$historal)
        {
            return response()->json([
                'message' => 'el prestamo no tiene registro',
                'status'=>500
            ]);
        }

        return response()->json([
            'message' => 'historial del prestamo',
            'data'=>$historal,
            'status'=>200
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestamo = Prestamo :: destroy($id);
    }
}
