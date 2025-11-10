@extends('layouts.app')
@section('title', 'Listado de Jugadoras')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Listado de Jugadoras</h1>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('jugadoras.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
    Añadir nueva jugadora
</a>

<table class="min-w-full bg-white border border-gray-300 rounded shadow">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4 text-left">Nombre</th>
            <th class="py-2 px-4 text-left">Equipo</th>
            <th class="py-2 px-4 text-left">Posición</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jugadoras as $jugadora)
            <x-jugadora 
                :nombre="$jugadora['nombre']"
                :equipo="$jugadora['equipo']"
                :posicion="$jugadora['posicion']"
            />
        @endforeach
    </tbody>
</table>
@endsection
