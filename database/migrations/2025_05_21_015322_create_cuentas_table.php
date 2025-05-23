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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->enum('tipo', ['AHORRO', 'CORRIENTE', 'PLAZO']);
            $table->decimal('saldo', 12, 2)->default(0);
            $table->string('estado')->default('ACTIVA');
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
