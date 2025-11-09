@extends('layouts.app')
@section('title', 'Estadios')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Estadios</h1>

<p class="mb-4">
    <a href="{{ route('estadios.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">+ Nuevo Estadio</a>
</p>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 p-2">Nombre</th>
            <th class="border border-gray-300 p-2">Ciudad</th>
            <th class="border border-gray-300 p-2">Capacidad</th>
            <th class="border border-gray-300 p-2">Equipo Principal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estadios as $estadio)
            <x-estadio 
                :nombre="$estadio['nombre']" 
                :ciudad="$estadio['ciudad']" 
                :capacidad="$estadio['capacidad']"
                :equipo_principal="$estadio['equipo_principal']"
            />
        @endforeach
    </tbody>
</table>
@endsection
