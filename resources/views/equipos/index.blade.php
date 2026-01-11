@extends('layouts.equipo')
@section('title', "Guía de Equipos")

@section('content')
@if (session('success'))
  <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('equipos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Nuevo equipo</a>
</p>

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 p-2">Nombre</th>
      <th class="border border-gray-300 p-2">Estadio</th>
      <th class="border border-gray-300 p-2">Títulos</th>
      <th class="border border-gray-300 p-2">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($equipos as $equipo)
      <tr class="hover:bg-gray-100">
        <td class="border border-gray-300 p-2">{{ $equipo->nombre }}</td>
        <td class="border border-gray-300 p-2">{{ $equipo->estadio->nombre }}</td>
        <td class="border border-gray-300 p-2">{{ $equipo->titulos }}</td>
        <td class="border border-gray-300 p-2 space-x-2">
            <a href="{{ route('equipos.edit', $equipo->id) }}" class="text-blue-600 hover:underline">Editar</a>
            <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
