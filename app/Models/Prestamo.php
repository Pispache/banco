<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'monto',
        'interes',
        'plazo',
        'cuenta_id',
        'estado_prestamo_id',
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'prestamo_id');
    }

    public function estadoPrestamo()
    {
        return $this->belongsTo(EstadoPrestamo::class, 'estado_prestamo_id');
    }
}