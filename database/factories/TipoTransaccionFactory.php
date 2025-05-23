<?php

namespace Database\Factories;

use App\Models\TipoTransaccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoTransaccionFactory extends Factory
{
    protected $model = TipoTransaccion::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement(['RETIRO', 'DEPOSITO', 'TRANSFERENCIA']),
        ];
    }
}
