@extends('layouts.equipo')

@section('title', 'Historial de Partidos')

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Historial de Partidos</h1>

<div class="mt-4">
    @livewire('historial-partidos')
</div>
@endsection
