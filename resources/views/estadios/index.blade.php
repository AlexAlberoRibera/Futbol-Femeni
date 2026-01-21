@extends('layouts.equipo')
@section('title', 'Listado de Estadios')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Listado de Estadios</h1>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('estadios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
    Añadir nuevo estadio
</a>

<table class="min-w-full bg-white border border-gray-300 rounded shadow">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4 text-left">Nombre</th>
            <th class="py-2 px-4 text-left">Ciudad</th>
            <th class="py-2 px-4 text-left">Capacidad</th>
            <th class="py-2 px-4 text-left">Equipo Principal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estadios as $estadio)
            <tr class="hover:bg-gray-100">
                <td class="border px-4 py-2">{{ $estadio->nombre }}</td>
                <td class="border px-4 py-2">{{ $estadio->ciudad }}</td>
                <td class="border px-4 py-2">{{ $estadio->capacidad }}</td>
                <td class="border px-4 py-2">
                    @if($estadio->equipoPrincipal)
                        <a href="{{ route('equipos.show', $estadio->equipoPrincipal->id) }}" 
                           class="text-blue-600 hover:underline">
                           {{ $estadio->equipoPrincipal->nombre }}
                        </a>
                    @else
                        <span class="text-gray-500">Sin equipo asignado</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
