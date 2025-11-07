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
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',80);
            $table->string('apellidos',120);
            $table->string('telefono',40);
            $table->string('correo')->unique();
            $table->date('fecha_nacimiento');
            $table->decimal('nota_media', 4,2);
            $table->string('experiencia', 200);
            $table->string('formacion', 200);
            $table->string('habilidades', 200);
            $table->string('fotografia', 100)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno');
    }
};
