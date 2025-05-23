<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $fillable = ['numero', 'cvv', 'limite', 'cuenta_id', 'estado_id'];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function estadoTarjetas()
    {
        return $this->belongsTo(EstadoTarjeta::class, 'estado_id');
    }
}