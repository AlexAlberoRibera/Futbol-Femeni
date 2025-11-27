@extends('layouts.app')
@section('title', "Detalle de Equipo")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">{{ $equipo->nombre }}</h1>

<div class="bg-gray-100 p-4 rounded shadow">
    <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
    <p><strong>Estadio:</strong> {{ $equipo->estadio->nombre ?? 'Sin estadio' }}</p>
    <p><strong>Títulos:</strong> {{ $equipo->titulos }}</p>
</div>

<a href="{{ route('partidos.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
    Volver a Listado de Partidos
</a>
<a href="{{ route('equipos.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
    Ir a equipos
</a>
@endsection
