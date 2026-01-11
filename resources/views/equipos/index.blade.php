@extends('layouts.equipo')
@section('title', __("Guía de Equipos"))

@section('content')
@if (session('success'))
  <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif

<p class="mb-4">
  @if(auth()->user()->role === 'admin')
      <a href="{{ route('equipos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">
          Nuevo equipo
      </a>
  @endif
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
        <td class="border border-gray-300 p-2 flex space-x-2">
          
          {{-- Editar: solo admin o manager de ese equipo --}}
          @if(auth()->user()->role === 'admin' || auth()->user()->team_id === $equipo->id)
              <a href="{{ route('equipos.edit', $equipo->id) }}"
                 class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                 Editar
              </a>
          @endif
          
          {{-- Eliminar: solo admin --}}
          @if(auth()->user()->role === 'admin')
              <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST"
                    onsubmit="return confirm('¿Seguro que quieres eliminar este equipo?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                      Eliminar
                  </button>
              </form>
          @endif

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
