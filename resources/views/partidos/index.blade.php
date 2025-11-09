@extends('layouts.app')
@section('title', 'Partidos')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Partidos</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
@endif

<p class="mb-4">
    <a href="{{ route('partidos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">+ Nuevo Partido</a>
</p>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 p-2">Local</th>
            <th class="border border-gray-300 p-2">Visitante</th>
            <th class="border border-gray-300 p-2">Fecha</th>
            <th class="border border-gray-300 p-2">Resultado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($partidos as $partido)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 p-2"><x-equipo-mini :nombre="$partido['local']"/></td>
                <td class="border border-gray-300 p-2"><x-equipo-mini :nombre="$partido['visitante']"/></td>
                <td class="border border-gray-300 p-2">{{ $partido['fecha'] }}</td>
                <td class="border border-gray-300 p-2">{{ $partido['resultado'] ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
