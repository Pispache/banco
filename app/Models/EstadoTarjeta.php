<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTarjeta extends Model
{
    use HasFactory;

    protected $table = 'estado_tarjetas';
    protected $fillable = ['nombre'];

    public function estadoTarjetas()
    {
        return $this->hasMany(Tarjeta::class, 'estado_id');
    }
}
