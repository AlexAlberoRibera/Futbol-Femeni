@extends('layouts.equipo')
@section('title', $equipo->nombre)

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-4">{{ $equipo->nombre }}</h1>

@if($equipo->escudo)
    <img src="{{ asset('storage/' . $equipo->escudo) }}" 
         alt="Escudo {{ $equipo->nombre }}" 
         class="w-24 h-24 object-contain mb-4">
@endif

<p><strong>Estadio:</strong> {{ $equipo->estadio->nombre }}</p>
<p><strong>Títulos:</strong> {{ $equipo->titulos }}</p>

<h2 class="mt-6 text-2xl font-bold">Partidos como local</h2>
<ul>
    @foreach($equipo->partidosComoLocal as $partido)
        <li>{{ $partido->visitante->nombre }} - {{ $partido->fecha }} - {{ $partido->resultado ?? 'El partido no se realizo' }}</li>
    @endforeach
</ul>

<h2 class="mt-6 text-2xl font-bold">Partidos como visitante</h2>
<ul>
    @foreach($equipo->partidosComoVisitante as $partido)
        <li>{{ $partido->local->nombre }} - {{ $partido->fecha }} - {{ $partido->resultado ?? 'El partido no se realizo' }}</li>
    @endforeach
</ul>

<div class="flex space-x-2 mb-4 mt-4">
    <a href="{{ route('equipos.index') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Listado de equipos</a>
    <a href="{{ route('partidos.index') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Volver a Listado de Partidos</a>
    <a href="{{ route('jugadoras.index') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Ir a la guía de Jugadoras</a>
</div>
@endsection
