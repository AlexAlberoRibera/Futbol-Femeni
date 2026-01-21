@extends('layouts.equipo')

@section('title', 'Detalles del Partido')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg shadow-lg p-8 mb-8">
        <h1 class="text-4xl font-bold mb-4">
            {{ $partido->local->nombre }} <span class="text-blue-200">vs</span> {{ $partido->visitante->nombre }}
        </h1>
        <div class="flex flex-wrap gap-6 text-blue-100">
            <div>
                <span class="text-sm opacity-75">Fecha</span>
                <p class="text-lg font-semibold">{{ $partido->fecha->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <span class="text-sm opacity-75">Resultado</span>
                <p class="text-lg font-semibold">
                    @if($partido->resultado)
                    <span class="text-green-300">{{ $partido->resultado }}</span>
                    @else
                    <span class="text-yellow-300">Pendiente</span>
                    @endif
                </p>
            </div>
            <div>
                <span class="text-sm opacity-75">Árbitro</span>
                <p class="text-lg font-semibold">
                    @if($partido->arbitro)
                    {{ $partido->arbitro->name }}
                    @else
                    <span class="text-yellow-300">Sin asignar</span>
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Equipo Local -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $partido->local->nombre }}</h2>
            <div class="space-y-3 text-gray-700">
                @if($partido->local->estadio)
                <div>
                    <span class="font-medium">Estadio:</span>
                    <a href="{{ route('estadios.show', $partido->local->estadio->id) }}" class="text-blue-600 hover:underline">
                        {{ $partido->local->estadio->nombre }}
                    </a>
                </div>
                @endif
                <div>
                    <span class="font-medium">Entrenador:</span>
                    <p class="text-gray-600">{{ $partido->local->entrenador ?? 'No especificado' }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('equipos.show', $partido->local->id) }}" class="text-blue-600 hover:underline text-sm font-medium">
                    Ver equipo →
                </a>
            </div>
        </div>

        <!-- Información Central -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Información</h2>
            <div class="space-y-4">
                <div class="border-b pb-3">
                    <span class="font-medium text-gray-700">Fecha completa</span>
                    <p class="text-gray-600">{{ $partido->fecha->format('l, d \\d\\e F \\d\\e Y') }}</p>
                </div>
                <div class="border-b pb-3">
                    <span class="font-medium text-gray-700">Hora</span>
                    <p class="text-gray-600">{{ $partido->fecha->format('H:i') }}</p>
                </div>
                <div class="border-b pb-3">
                    <span class="font-medium text-gray-700">Estado</span>
                    <p>
                        @if($partido->resultado)
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Finalizado</span>
                        @elseif($partido->fecha->isPast())
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Sin resultado</span>
                        @else
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Programado</span>
                        @endif
                    </p>
                </div>
                <div>
                    <span class="font-medium text-gray-700">Creado</span>
                    <p class="text-gray-600 text-sm">{{ $partido->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Equipo Visitante -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $partido->visitante->nombre }}</h2>
            <div class="space-y-3 text-gray-700">
                @if($partido->visitante->estadio)
                <div>
                    <span class="font-medium">Estadio:</span>
                    <a href="{{ route('estadios.show', $partido->visitante->estadio->id) }}" class="text-blue-600 hover:underline">
                        {{ $partido->visitante->estadio->nombre }}
                    </a>
                </div>
                @endif
                <div>
                    <span class="font-medium">Entrenador:</span>
                    <p class="text-gray-600">{{ $partido->visitante->entrenador ?? 'No especificado' }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('equipos.show', $partido->visitante->id) }}" class="text-blue-600 hover:underline text-sm font-medium">
                    Ver equipo →
                </a>
            </div>
        </div>
    </div>

    <!-- Árbitro (si está asignado) -->
    @if($partido->arbitro)
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
        <h3 class="text-xl font-bold text-blue-900 mb-4">Árbitro del partido</h3>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-lg font-semibold text-blue-900">{{ $partido->arbitro->name }}</p>
                <p class="text-blue-700">{{ $partido->arbitro->email }}</p>
            </div>
            <div class="text-right">
                <span class="inline-block bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                    Árbitro
                </span>
            </div>
        </div>
    </div>

    @endif

    <!-- Botones de navegación y acciones -->
    <div class="flex flex-wrap gap-3">
        @if(auth()->user()->isAdmin() || (auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id))
        <a href="{{ route('partidos.edit', $partido->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
            Editar resultado
        </a>
        @endif
        <a href="{{ route('partidos.calendario') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
            Volver calendario
        </a>




        {{-- <a href="{{ route('partidos.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition">
        Volver al listado
        </a> --}}

    </div>
</div>
@endsection