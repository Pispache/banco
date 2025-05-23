<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_transaccion_id')->constrained('tipos_transaccion')->onDelete('restrict');
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha')->useCurrent();
            $table->foreignId('cuenta_origen_id')->nullable()->constrained('cuentas')->onDelete('cascade');
            $table->foreignId('cuenta_destino_id')->nullable()->constrained('cuentas')->onDelete('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};