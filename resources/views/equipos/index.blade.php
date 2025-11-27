@extends('layouts.app')
@section('title', "Guia de Equipos")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Guia de Equipos</h1>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('equipos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Nou equip</a>
</p>

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 p-2">Nombre</th>
      <th class="border border-gray-300 p-2">Estadio</th>
      <th class="border border-gray-300 p-2">Títulos</th>
      <th class="border border-gray-300 p-2">Jugadoras</th>
    </tr>
  </thead>
  <tbody>
    @foreach($equipos as $equipo)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">{{ $equipo->nombre }}</td>
      <td class="border border-gray-300 p-2">{{ $equipo->estadio->nombre ?? 'Sin estadio' }}</td>
      <td class="border border-gray-300 p-2">{{ $equipo->titulos }}</td>
      <td class="border border-gray-300 p-2">
        <a href="{{ route('equipos.jugadoras', $equipo->id) }}" class="text-green-700 hover:underline">
          Ver jugadoras
        </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection