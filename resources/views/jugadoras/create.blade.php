@extends('layouts.app')
@section('title', 'Añadir Jugadora')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Añadir Nueva Jugadora</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
    </ul>
</div>
@endif

<form action="{{ route('jugadoras.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="nombre" class="block font-medium mb-1">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label for="equipo" class="block font-medium mb-1">Equipo:</label>
        <input type="text" name="equipo" id="equipo" value="{{ old('equipo') }}" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label for="posicion" class="block font-medium mb-1">Posición:</label>
        <select name="posicion" id="posicion" class="w-full border p-2 rounded" required>
            <option value="">Selecciona posición</option>
            <option value="Portera">Portera</option>
            <option value="Defensa">Defensa</option>
            <option value="Migcampista">Migcampista</option>
            <option value="Davantera">Davantera</option>
        </select>
    </div>
    <div class="flex space-x-2 mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('jugadoras.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
</form>
@endsection
