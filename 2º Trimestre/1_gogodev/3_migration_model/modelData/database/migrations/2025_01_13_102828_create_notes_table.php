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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title', 255);//varchar(100)
            $table->string('description',255)->nullable();//text
            $table->boolean('done')->default(false);//tinyint(1)

             // existen mas tipos de datos:
            //$table->integer( '22');
            //$table->unsignedIntegerinteger( 'example');
            //$table->text( 'example');
            //$table->double( 'example');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
