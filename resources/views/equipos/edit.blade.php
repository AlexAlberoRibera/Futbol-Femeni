@extends('layouts.equipo')
@section('title', "Modificación de Equipo")

@section('content')
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="nombre" class="block font-bold">Nombre:</label>
        <input type="text" name="nombre" id="nombre"
               value="{{ old('nombre', $equipo->nombre) }}"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label for="estadio_id" class="block font-bold">Estadio:</label>
        <select name="estadio_id" id="estadio_id" class="border p-2 w-full" required>
            @foreach ($estadios as $estadio)
                <option value="{{ $estadio->id }}" 
                    {{ old('estadio_id', $equipo->estadio_id) == $estadio->id ? 'selected' : '' }}>
                    {{ $estadio->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="titulos" class="block font-bold">Títulos:</label>
        <input type="number" name="titulos" id="titulos"
               value="{{ old('titulos', $equipo->titulos) }}"
               class="border p-2 w-full" min="0" required>
    </div>

    <div>
        <label for="escudo" class="block font-bold">Escudo (PNG/JPG, max 2 MB):</label>
        @if ($equipo->escudo)
            <img src="{{ asset('storage/' . $equipo->escudo) }}" alt="Escudo" class="h-16 mb-2">
        @endif
        <input type="file" name="escudo" id="escudo" accept="image/png, image/jpeg" class="w-full border p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
</form>
@endsection
