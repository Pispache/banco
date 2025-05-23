<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->foreignId('estado_prestamo_id')->after('cuenta_id')->nullable()->constrained('estados_prestamo');
        });
    }

    public function down() {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropForeign(['estado_prestamo_id']);
            $table->dropColumn('estado_prestamo_id');
        });
    }
};
