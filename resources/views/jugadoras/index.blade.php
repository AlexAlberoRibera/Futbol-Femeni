@extends('layouts.equipo')
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
            <th class="py-2 px-4 text-left">nombre</th>
            <th class="py-2 px-4 text-left">equipo</th>
            <th class="py-2 px-4 text-left">Posición</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jugadoras as $jugadora)
        <tr class="hover:bg-gray-100">
            <!-- nombre con enlace a show de la jugadora -->
            <td class="border border-gray-300 p-2">
                <a href="{{ route('jugadoras.show', $jugadora->id) }}" class="text-blue-700 hover:underline">
                    {{ $jugadora->nombre }}
                </a>
            </td>

            <!-- equipo con enlace a show del equipo -->
             <td class="border border-gray-300 p-2">{{ $jugadora->equipo->nombre }}</td>
                <td class="border border-gray-300 p-2">{{ $jugadora->posicion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection