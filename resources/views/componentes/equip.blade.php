@props(['nombre', 'estadio', 'titulos'])

<div class="equip border rounded-lg shadow-md p-4 bg-white">
    <h2 class="text-xl font-bold text-blue-800">{{ $nombre }}</h2>
    <p><strong>Estadio:</strong> {{ $estadio }}</p>
    <p><strong>Títulos:</strong> {{ $titulos }}</p>
</div>
