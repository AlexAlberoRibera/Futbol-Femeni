@extends('layouts.app')
@section('title', 'Detalle del Estadio')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Detalle del Estadio</h1>

<div class="border border-gray-300 rounded p-4 bg-white shadow">
    <h2 class="text-2xl font-semibold text-blue-800 mb-2">{{ $estadio['nombre'] }}</h2>
    <p class="mb-1"><strong>Ciudad:</strong> {{ $estadio['ciudad'] }}</p>
    <p class="mb-1"><strong>Capacidad:</strong> {{ $estadio['capacidad'] }}</p>
    <p class="mb-1"><strong>Equipo Principal:</strong> {{ $estadio['equipo_principal'] }}</p>
</div>

<p class="mt-4">
    <a href="{{ route('estadios.index') }}" class="bg-gray-600 text-white px-3 py-2 rounded hover:bg-gray-700">Volver a la lista</a>
</p>
@endsection
