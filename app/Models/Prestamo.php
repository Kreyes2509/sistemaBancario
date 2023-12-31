<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';

    protected $fillable = [

        'monto_prestamo',
        'tasa_interes',
        'plazo_pago',
        'fecha_solicitud',
        'fecha_aprobacion',
        'metodo_pago',
        'cuota',
        'estado_prestamo',
        'tipo_prestamo',
        'garantia',
        'clienteID',
    ];
}
