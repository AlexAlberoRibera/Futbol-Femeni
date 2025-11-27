@props(['jugadora'])

<div class="jugadora border rounded-lg shadow-md p-4 bg-white">
    <h2 class="text-xl font-bold text-blue-800 mb-1">{{ $jugadora['nombre'] }}</h2>
    <p><strong>Equipo:</strong> {{ $jugadora['equipo'] }}</p>
    <p><strong>Posición:</strong> {{ $jugadora['posicion'] }}</p>
    <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($jugadora['fecha_nacimiento'])->format('d/m/Y') }}</p>
    <p><strong>Dorsal:</strong> {{ $jugadora['dorsal'] }}</p>
    <p><strong>Goles:</strong> {{ $jugadora['gols'] ?? 0 }}</p>
    @if($jugadora['foto'])
        <img src="{{ asset('storage/' . $jugadora['foto']) }}" alt="Foto de {{ $jugadora['nombre'] }}" class="mt-2 w-full h-auto rounded">
    @endif
</div>
