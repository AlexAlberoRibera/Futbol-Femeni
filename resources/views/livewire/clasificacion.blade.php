<div>
    <h1 class="text-2xl font-bold mb-4">Clasificación</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th>equipo</th>
                <th>Puntos</th>
                <th>GF</th>
                <th>GC</th>
                <th>Diferencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->puntos }}</td>
                    <td>{{ $equipo->gf }}</td>
                    <td>{{ $equipo->gc }}</td>
                    <td>{{ $equipo->dif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
