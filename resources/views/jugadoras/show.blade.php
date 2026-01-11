@extends('layouts.equipo')
@section('title', $jugadora->nombre)

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-4">{{ $jugadora->nombre }}</h1>

@if($jugadora->foto)
    <img src="data:image/png;base64,{{ $jugadora->foto }}" alt="{{ $jugadora->nombre }}" class="w-32 h-32 object-cover rounded-full mb-4">
@else
    <p class="text-gray-500 mb-4">Foto no disponible</p>
@endif

<p><strong>equipo:</strong> 
    <a href="{{ route('equipos.show', $jugadora->equipo->id) }}" class="text-blue-700 hover:underline">
        {{ $jugadora->equipo->nombre }}
    </a>
</p>

<p><strong>Posición:</strong> {{ $jugadora->posicion }}</p>

<div class="flex space-x-2 mt-4">
    <a href="{{ route('jugadoras.index') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">
        Listado de Jugadoras
    </a>
    <a href="{{ route('equipos.show', $jugadora->equipo->id) }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">
        Ver los datos del equipo
    </a>
</div>
@endsection
