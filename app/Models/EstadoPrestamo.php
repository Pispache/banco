<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoPrestamo extends Model
{
    protected $table = 'estados_prestamo';
    protected $fillable = ['nombre'];
}
