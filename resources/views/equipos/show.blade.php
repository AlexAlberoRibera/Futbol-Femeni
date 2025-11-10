@extends('layouts.app')
@section('title', 'Detalle del Equipo')

@section('content')
<table class="min-w-full bg-white border border-gray-300 rounded shadow">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4 text-left">Nombre</th>
            <th class="py-2 px-4 text-left">Estadio</th>
            <th class="py-2 px-4 text-left">Títulos</th>
        </tr>
    </thead>
    <tbody>
        <x-equipo 
            :nombre="$equipo['nombre']" 
            :estadio="$equipo['estadio']" 
            :titulos="$equipo['titulos']"
        />
    </tbody>
</table>
<a href="{{ route('equipos.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 mt-4 inline-block">
    Volver al listado
</a>
@endsection
