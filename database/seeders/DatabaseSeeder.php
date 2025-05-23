<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('status_clientes')->insert([
            ['nombre' => 'Activo'],
            ['nombre' => 'Inactivo'],
            ['nombre' => 'Moroso'],
            ['nombre' => 'Bloqueado'],
        ]);

        // Estados de cuenta
        DB::table('estado_cuentas')->insert([
            ['nombre' => 'Activa', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Inactiva', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Bloqueada', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('estado_tarjetas')->insert([
            ['nombre' => 'Activa', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Inactiva', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Bloqueada', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
        // Insertar tipos iniciales
        DB::table('tipos_transaccion')->insert([
            ['nombre' => 'Retiro'],
            ['nombre' => 'Deposito'],
            ['nombre' => 'Transferencia'],
        ]);

        DB::table('estados_prestamo')->insert([
            ['nombre' => 'Pagado'],
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Cancelado'],
        ]);
    }
}
