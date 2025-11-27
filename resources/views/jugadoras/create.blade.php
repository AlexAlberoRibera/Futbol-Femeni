@extends('layouts.app')
@section('title', 'Añadir Jugadora')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Añadir Nueva Jugadora</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('jugadoras.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label for="nombre" class="block font-medium mb-1">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label for="equipo_id" class="block font-medium mb-1">Equipo:</label>
        <select name="equipo_id" id="equipo_id" class="w-full border p-2 rounded" required>
            <option value="">Selecciona un equipo</option>
            @foreach($equipos as $equipo)
            <option value="{{ $equipo->id }}" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                {{ $equipo->nombre }}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="posicion" class="block font-medium mb-1">Posición:</label>
        <select name="posicion" id="posicion" class="w-full border p-2 rounded" required>
            <option value="">Selecciona posición</option>
            <option value="Portera" {{ old('posicion') == 'Portera' ? 'selected' : '' }}>Portera</option>
            <option value="Defensa" {{ old('posicion') == 'Defensa' ? 'selected' : '' }}>Defensa</option>
            <option value="Mediocampista" {{ old('posicion') == 'Mediocampista' ? 'selected' : '' }}>Mediocampista</option>
            <option value="Delantera" {{ old('posicion') == 'Delantera' ? 'selected' : '' }}>Delantera</option>
        </select>
    </div>
    <div>
        <label for="fecha_nacimiento" class="block font-medium mb-1">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label for="dorsal" class="block font-medium mb-1">Dorsal:</label>
        <input type="number" name="dorsal" id="dorsal" value="{{ old('dorsal') }}" class="w-full border p-2 rounded" min="1" required>
    </div>

    <div>
        <label for="goles" class="block font-medium mb-1">Goles:</label>
        <input type="number" name="goles" id="goles" value="{{ old('goles') }}" class="w-full border p-2 rounded" min="0">
    </div>

    <div>
        <label for="foto" class="block font-medium mb-1">Foto:</label>
        <input type="file" name="foto" id="foto" class="w-full border p-2 rounded">
    </div>

    <div class="flex space-x-2 mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('jugadoras.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
</form>
@endsection