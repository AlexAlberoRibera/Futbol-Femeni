<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->enum('posicion', ['Portera', 'Defensa', 'Mediocampista', 'Delantera']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jugadoras');
    }
};
