@extends('layouts.app')
@section('title', 'Jugadoras')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Jugadoras</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
@endif

<p class="mb-4">
    <a href="{{ route('jugadoras.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">+ Nueva Jugadora</a>
</p>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 p-2">Nombre</th>
            <th class="border border-gray-300 p-2">Equipo</th>
            <th class="border border-gray-300 p-2">Posición</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jugadoras as $jugadora)
            <x-jugadora 
                :nombre="$jugadora['nombre']" 
                :equipo="$jugadora['equipo']" 
                :posicion="$jugadora['posicion']"
            />
        @endforeach
    </tbody>
</table>
@endsection
