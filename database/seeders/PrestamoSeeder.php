<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historialprestamo;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestamo = new Prestamo();
        $prestamo->monto_prestamo = 20000;
        $prestamo->tasa_interes = '20%';
        $prestamo->plazo_pago = '6';
        $fechaCarbon = Carbon::parse(Carbon::now());
        $fechaRestada = $fechaCarbon->subDay();
        $prestamo->fecha_solicitud = Carbon::now();
        $prestamo->metodo_pago = 'Nomina';
        $prestamo->cuota = 4055.39;
        $prestamo->fecha_aprobacion = Carbon::now();
        $prestamo->estado_prestamo = 'ACTIVO';
        $prestamo->tipo_prestamo = "Personal";
        $prestamo->garantia = "carro";
        $prestamo->clienteID = 3;
        $prestamo->save();


        $historial = new Historialprestamo();
        $historial->periodo = 'Junio';
        $historial->folio = rand(1000, 1000000);
        $historial->total = 4055.39;
        $historial->fechaVencimiento = '2023-06-03';
        $historial->estado_pago = 'PENDIENTE';
        $historial->prestamoID = 1;
        $historial->save();

        $historial2 = new Historialprestamo();
        $historial2->periodo = 'Julio';
        $historial2->folio = rand(1000, 1000000);
        $historial2->total = 4055.39;
        $historial2->fechaVencimiento = '2023-07-03';
        $historial2->estado_pago = 'PENDIENTE';
        $historial2->prestamoID = 1;
        $historial2->save();

        $historial3 = new Historialprestamo();
        $historial3->periodo = 'Agosto';
        $historial3->folio = rand(1000, 1000000);
        $historial3->total = 4055.39;
        $historial3->fechaVencimiento = '2023-08-03';
        $historial3->estado_pago = 'PENDIENTE';
        $historial3->prestamoID = 1;
        $historial3->save();
    }
}
