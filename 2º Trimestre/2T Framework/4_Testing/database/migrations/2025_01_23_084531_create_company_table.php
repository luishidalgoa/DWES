<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear las migraciones.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address', 255)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('date_creation')->nullable();
            $table->unsignedBigInteger('professor_id')->nullable(); // Permitir null
            $table->timestamps();

            // Definición de la clave foránea con actualización en cascada y eliminación en cascada
            $table->foreign('professor_id')
                ->references('id')->on('professors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Rollbacking.
     */
    public function down(): void
    {
        // Deshabilitar restricciones de clave foránea antes de eliminar la tabla
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('companies');
        // Habilitar restricciones de clave foránea después de eliminar la tabla
        Schema::enableForeignKeyConstraints();
    }
};
