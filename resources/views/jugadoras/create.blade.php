@extends('layouts.equipo')

@section('title', 'Crear Jugadora')

@section('content')
@can('create', App\Models\Jugadora::class)

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('jugadoras.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium mb-1">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Equipo:</label>
        <select name="equipo_id" class="w-full border p-2 rounded" required>
            <option value="">Selecciona un equipo</option>
            @foreach($equipos as $equipo)
            <option value="{{ $equipo->id }}" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                {{ $equipo->nombre }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium mb-1">Posición:</label>
        <select name="posicion" class="w-full border p-2 rounded" required>
            <option value="">Selecciona una posición</option>
            @foreach($posiciones as $posicion)
            <option value="{{ $posicion }}" {{ old('posicion') == $posicion ? 'selected' : '' }}>
                {{ $posicion }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium mb-1">Foto (PNG, máx. 2 MB):</label>
        <input type="file" name="foto" accept="image/png" class="w-full border p-2 rounded">
    </div>

    <div class="flex space-x-2 mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('jugadoras.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
</form>

@else
<p class="text-red-600 font-medium">No tienes permiso para crear jugadoras.</p>
@endcan
@endsection