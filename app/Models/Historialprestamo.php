<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historialprestamo extends Model
{
    use HasFactory;

    protected $table = 'historialprestamo';

    protected $fillable = [
        'periodo',
        'folio',
        'concepto',
        'total',
        'pagado',
        'fechaVencimiento',
        'estado_pago',
        'prestamoID'
    ];
}
