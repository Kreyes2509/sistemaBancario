<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCobrador extends Model
{
    use HasFactory;

    protected $table = 'cliente_cobrador';

    protected $fillable = [
        'id',
        'clienteID',
        'cobradorID'
	];
}
