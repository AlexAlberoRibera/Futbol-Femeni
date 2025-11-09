@extends('layouts.app')
@section('title', 'Nuevo Partido')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Añadir Nuevo Partido</h1>

@if($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('partidos.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium mb-1">Equipo Local:</label>
        <input type="text" name="local" value="{{ old('local') }}" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Equipo Visitante:</label>
        <input type="text" name="visitante" value="{{ old('visitante') }}" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Fecha:</label>
        <input type="date" name="fecha" value="{{ old('fecha') }}" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Resultado (opcional):</label>
        <input type="text" name="resultado" value="{{ old('resultado') }}" class="w-full border border-gray-300 rounded p-2" placeholder="Ej: 2-1">
    </div>

    <div class="flex space-x-2 mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('partidos.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
</form>
@endsection
