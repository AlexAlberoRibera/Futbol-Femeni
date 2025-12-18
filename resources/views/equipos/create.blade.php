@extends('layouts.equipo')
@section('title', 'Nuevo Equipo')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Añadir Nuevo Equipo</h1>

@if($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('equipos.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium mb-1">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Estadio:</label>
        <select name="estadio_id" class="w-full border p-2 rounded" required>
            <option value="">Selecciona un estadio</option>
            @foreach($estadios as $estadio)
                <option value="{{ $estadio->id }}" {{ old('estadio_id') == $estadio->id ? 'selected' : '' }}>
                    {{ $estadio->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium mb-1">Títulos:</label>
        <input type="number" name="titulos" value="{{ old('titulos') }}" class="w-full border p-2 rounded" min="0" required>
    </div>

    <div class="flex space-x-2 mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('equipos.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
</form>
@endsection
