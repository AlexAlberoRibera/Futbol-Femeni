@extends('layouts.app')
@section('title', 'Listado de Partidos')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Listado de Partidos</h1>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('partidos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
    Añadir nuevo partido
</a>

<table class="min-w-full bg-white border border-gray-300 rounded shadow">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4 text-left">Local</th>
            <th class="py-2 px-4 text-left">Visitante</th>
            <th class="py-2 px-4 text-left">Fecha</th>
            <th class="py-2 px-4 text-left">Resultado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($partidos as $partido)
        <tr class="hover:bg-gray-100">
            <td class="border border-gray-300 p-2">
                <a href="{{ route('equipos.show', $partido->local->id) }}" class="text-blue-700 hover:underline">
                    {{ $partido->local->nombre }}
                </a>
            </td>
            <td class="border border-gray-300 p-2">
                <a href="{{ route('equipos.show', $partido->visitante->id) }}" class="text-blue-700 hover:underline">
                    {{ $partido->visitante->nombre }}
                </a>
            </td>
            <td class="border border-gray-300 p-2">{{ $partido->fecha }}</td>
            <td class="border border-gray-300 p-2">{{ $partido->resultado ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
