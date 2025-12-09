@extends('layouts.equipo')
@section('title', "Detalle de Jugadora")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Detalle de Jugadora</h1>

<div class="bg-white p-6 rounded shadow max-w-md">
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Nombre:</span>
        <span class="text-gray-900">{{ $jugadora->nombre }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Fecha de Nacimiento:</span>
        <span class="text-gray-900">{{ \Carbon\Carbon::parse($jugadora->fecha_nacimiento)->format('d/m/Y') }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Foto:</span>
        <div class="mt-2">
            @if($jugadora->foto)
                <img src="{{ asset('storage/' . $jugadora->foto) }}" alt="Foto de {{ $jugadora->nombre }}" class="w-48 h-48 object-cover rounded">
            @else
                <span class="text-gray-500">No hay foto disponible</span>
            @endif
        </div>
    </div>

    <a href="{{ route('jugadoras.index') }}" class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
        Volver al listado
    </a>
</div>
@endsection
