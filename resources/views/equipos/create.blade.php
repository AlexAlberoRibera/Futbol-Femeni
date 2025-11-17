@extends('layouts.app')
@section('title', 'Añadir nuevo equipo')

@section('content')
<h1 class="text-2xl font-bold mb-4">Añadir nuevo equipo</h1>

@if ($errors->any())
  <div class="bg-red-100 text-red-700 p-2 mb-4">
    <ul>
      @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('equipos.store') }}" method="POST" class="space-y-4">
  @csrf
  <div>
    <label for="nombre" class="block font-bold">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="border p-2 w-full">
  </div>
  <div>
    <label for="estadio" class="block font-bold">Estadio:</label>
    <input type="text" name="estadio" id="estadio" value="{{ old('estadio') }}" class="border p-2 w-full">
  </div>
  <div>
    <label for="titulos" class="block font-bold">Títulos:</label>
    <input type="text" name="titulos" id="titulos" value="{{ old('titulos') }}" class="border p-2 w-full">
  </div>
  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Añadir</button>
</form>
@endsection