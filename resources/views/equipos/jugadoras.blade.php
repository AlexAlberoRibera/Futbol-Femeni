@extends('layouts.app')
@section('title', "Jugadoras de {$equipo->nombre}")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Jugadoras de {{ $equipo->nombre }}</h1>

@if($jugadoras->count() > 0)
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 p-2">Nombre</th>
                <th class="border border-gray-300 p-2">Posición</th>
                <th class="border border-gray-300 p-2">Dorsal</th>
                <th class="border border-gray-300 p-2">Goles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadoras as $jugadora)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 p-2">{{ $jugadora->nombre }}</td>
                <td class="border border-gray-300 p-2">{{ $jugadora->posicion }}</td>
                <td class="border border-gray-300 p-2">{{ $jugadora->dorsal }}</td>
                <td class="border border-gray-300 p-2">{{ $jugadora->goles ?? 0 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="bg-yellow-100 text-yellow-800 p-2 mb-4 rounded">No hay jugadoras en este equipo.</div>
@endif

<p class="mt-4">
    <a href="{{ route('equipos.index') }}" class="bg-gray-600 text-white px-3 py-2 rounded hover:bg-gray-700">Volver a equipos</a>
</p>
@endsection
