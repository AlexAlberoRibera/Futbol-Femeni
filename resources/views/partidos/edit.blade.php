@extends('layouts.equipo')

@section('title', 'Editar Partido')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Editar Partido</h1>

    @if(!auth()->user()->isAdmin() && !auth()->user()->isArbitre())
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
            <p class="text-red-800 font-medium">No tienes permisos para editar este partido.</p>
        </div>
        <a href="{{ route('partidos.index') }}" class="text-blue-600 hover:underline">Volver al listado</a>
    @else
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                    {{ $partido->local->nombre }} <span class="text-blue-600">vs</span> {{ $partido->visitante->nombre }}
                </h2>
                <div class="grid grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <span class="font-medium">Fecha:</span>
                        {{ $partido->fecha->format('d/m/Y H:i') }}
                    </div>
                    <div>
                        <span class="font-medium">Árbitro:</span>
                        @if($partido->arbitro)
                            {{ $partido->arbitro->name }}
                        @else
                            <span class="text-gray-400">Sin asignar</span>
                        @endif
                    </div>
                </div>
            </div>

            <form action="{{ route('partidos.update', $partido->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Resultado (accesible para árbitro del partido o admin) -->
                @if(auth()->user()->isAdmin() || (auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id))
                    <div>
                        <label for="resultado" class="block text-sm font-medium text-gray-700 mb-2">
                            Resultado (formato: 2-1)
                        </label>
                        <input
                            type="text"
                            id="resultado"
                            name="resultado"
                            value="{{ old('resultado', $partido->resultado) }}"
                            placeholder="Ej: 2-1"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            pattern="\d+-\d+"
                            title="Formato: número-número (ej: 2-1)"
                        />
                        @error('resultado')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <p class="text-yellow-800">
                            <strong>Nota:</strong> Solo el árbitro asignado o un administrador puede actualizar el resultado.
                        </p>
                    </div>
                @endif

                <!-- Árbitro (solo admin) -->
                @if(auth()->user()->isAdmin())
                    <div>
                        <label for="arbitro_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Árbitro
                        </label>
                        <select
                            id="arbitro_id"
                            name="arbitro_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                            <option value="">-- Sin asignar --</option>
                            @foreach($arbitros as $arbitro)
                                <option value="{{ $arbitro->id }}" @selected(old('arbitro_id', $partido->arbitro_id) == $arbitro->id)>
                                    {{ $arbitro->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('arbitro_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <!-- Botones -->
                @if(auth()->user()->isAdmin() || (auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id))
                    <div class="flex gap-4">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition"
                        >
                            Guardar cambios
                        </button>
                        <a
                            href="{{ route('partidos.index') }}"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition"
                        >
                            Cancelar
                        </a>
                        <a
                            href="{{ route('partidos.calendario') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg transition"
                        >
                            Volver al calendario
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- Resultado actual (si existe) -->
        @if($partido->resultado)
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h3 class="font-semibold text-green-900 mb-2">Resultado actual</h3>
                <p class="text-green-800">{{ $partido->local->nombre }} <strong>{{ $partido->resultado }}</strong> {{ $partido->visitante->nombre }}</p>
                <p class="text-green-700 text-sm mt-2">Actualizado: {{ $partido->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        @else
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h3 class="font-semibold text-yellow-900">Resultado pendiente</h3>
                <p class="text-yellow-800">Este partido aún no tiene resultado registrado.</p>
            </div>
        @endif
    @endif
</div>
@endsection
