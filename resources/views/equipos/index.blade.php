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
  </tr>
  </thead>
  <tbody>
  @foreach($equipos as $key => $equipo)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">
        <a href="{{ route('equipos.show', $key) }}" class="text-blue-700 hover:underline">{{ $equipo['nombre'] }}</a>
      </td>
      <td class="border border-gray-300 p-2">{{ $equipo['estadio'] }}</td>
      <td class="border border-gray-300 p-2">{{ $equipo['titulos'] }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection