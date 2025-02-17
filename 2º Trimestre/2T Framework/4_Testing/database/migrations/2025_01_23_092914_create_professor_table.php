<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear las migraciones.
     */
// En el archivo de migración professors
public function up(): void
{
    Schema::create('professors', function (Blueprint $table) {
        $table->id();
        $table->string('fullname', 100);
        $table->integer('age');
        $table->enum('gender', ['male', 'female', 'other']);
        $table->string('address');
        $table->string('telephone', 9);
        $table->string('email', 50);
        $table->string('password'); // Columna nueva
        $table->timestamps();
    });
}

    /**
     * Rollbacking.
     */
    public function down(): void
    {
        // Deshabilitar restricciones de clave foránea antes de eliminar la tabla
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('professors');
        // Habilitar restricciones de clave foránea después de eliminar la tabla
        Schema::enableForeignKeyConstraints();
    }
};
