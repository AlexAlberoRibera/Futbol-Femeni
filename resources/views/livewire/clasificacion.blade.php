<div>
    <h2 class="text-2xl font-bold mb-4">Clasificación</h2>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-blue-100">
            <tr>
                <th class="border p-2">Equipo</th>
                <th class="border p-2">Puntos</th>
                <th class="border p-2">GF</th>
                <th class="border p-2">GC</th>
                <th class="border p-2">Dif</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr class="hover:bg-gray-100">
                    <td class="border p-2">
                        <a href="{{ route('equipos.show', $equipo->id) }}" class="text-blue-600 hover:underline">
                            {{ $equipo->nombre }}
                        </a>
                    </td>
                    <td class="border p-2">{{ $equipo->puntos }}</td>
                    <td class="border p-2">{{ $equipo->gf }}</td>
                    <td class="border p-2">{{ $equipo->gc }}</td>
                    <td class="border p-2">{{ $equipo->dif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
