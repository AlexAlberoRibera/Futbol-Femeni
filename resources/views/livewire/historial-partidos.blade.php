<div>
    <div class="flex space-x-4 mb-4">
        <input wire:model="equipo" type="text" placeholder="Buscar equipo" class="border p-2 rounded">
        <input wire:model="fecha" type="date" class="border p-2 rounded">
        <button wire:click="filtrar" class="bg-blue-600 text-white px-4 py-2 rounded">Filtrar</button>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-blue-100">
            <tr>
                <th class="py-2 px-4">Fecha</th>
                <th class="py-2 px-4">Local</th>
                <th class="py-2 px-4">Visitante</th>
                <th class="py-2 px-4">Resultado</th>
                <th class="py-2 px-4">Estadio</th>
                <th class="py-2 px-4">Árbitre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partidos as $partido)
            <tr class="hover:bg-gray-100">
                <td class="border px-2 py-1">{{ $partido->fecha }}</td>
                <td class="border px-2 py-1">{{ $partido->local->nombre }}</td>
                <td class="border px-2 py-1">{{ $partido->visitante->nombre }}</td>
                <td class="border px-2 py-1">{{ $partido->resultado ?? '-' }}</td>
                <td class="border px-2 py-1">{{ $partido->estadio->nombre }}</td>
                <td class="border px-2 py-1">{{ $partido->arbitre->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
