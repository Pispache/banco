<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = ['numero', 'tipo', 'saldo', 'user_id', 'estado_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusCuenta()
    {
        return $this->belongsTo(EstadoCuenta::class, 'estado_id');
    }
}
