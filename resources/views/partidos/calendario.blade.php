@extends('layouts.equipo')

@section('title', 'Calendario de Partidos')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-4xl font-bold mb-8 text-gray-900">Calendario de Partidos</h1>

    @if($partidos->isEmpty())
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-yellow-800">No hay partidos programados aún.</p>
        </div>
    @else
        <div class="space-y-8">
            @foreach($partidos as $fecha => $partidosPorDia)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-blue-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">
                            {{ \Carbon\Carbon::parse($fecha)->format('l, d \d\e F \d\e Y') }}
                        </h2>
                    </div>

                    <div class="divide-y divide-gray-200">
                        @foreach($partidosPorDia as $partido)
                            <div class="px-6 py-4 hover:bg-gray-50 transition">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-semibold text-gray-900">
                                        {{ $partido->local->nombre }} 
                                        <span class="text-blue-600">vs</span> 
                                        {{ $partido->visitante->nombre }}
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4 text-sm text-gray-600">
                                    <div>
                                        <span class="font-medium">Hora:</span>
                                        {{ $partido->fecha->format('H:i') }}
                                    </div>
                                    <div>
                                        <span class="font-medium">Árbitro:</span>
                                        @if($partido->arbitro)
                                            <a href="#" class="text-blue-600 hover:underline">
                                                {{ $partido->arbitro->name }}
                                            </a>
                                        @else
                                            <span class="text-gray-400">Sin asignar</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">Resultado:</span>
                                        @if($partido->resultado)
                                            <span class="text-green-600 font-semibold">{{ $partido->resultado }}</span>
                                        @else
                                            <span class="text-gray-400">Pendiente</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-3 flex gap-2">
                                    <a href="{{ route('partidos.show', $partido->id) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                        Ver detalles
                                    </a>
                                    @if(auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id)
                                        <a href="{{ route('partidos.edit', $partido->id) }}" class="text-green-600 hover:text-green-900 text-sm font-medium">
                                            Actualizar resultado
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('partidos.historico') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Volver a Partidos
        </a>
    </div>
</div>
@endsection
