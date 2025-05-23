// Archivo obsoleto, modelo Cliente eliminado. Usar User en su lugar.

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre_completo',
        'dpi',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'correo',
        'status_cliente_id',
    ];

    public function statusCliente()
    {
        return $this->belongsTo(StatusCliente::class, 'status_cliente_id');
    }

    // Relación para obtener todas las cuentas del cliente
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class, 'cliente_id');
    }
}
