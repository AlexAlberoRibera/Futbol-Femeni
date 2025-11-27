<form action="{{ route('partidos.store') }}" method="POST" class="space-y-4">
    @csrf

    <!-- Equipo local -->
    <div>
        <label for="equipo_local_id">Equipo Local:</label>
        <select name="equipo_local_id" id="equipo_local_id" class="w-full border p-2 rounded" required>
            <option value="">Selecciona un equipo</option>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                    {{ $equipo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Equipo visitante -->
    <div>
        <label for="equipo_visitante_id">Equipo Visitante:</label>
        <select name="equipo_visitante_id" id="equipo_visitante_id" class="w-full border p-2 rounded" required>
            <option value="">Selecciona un equipo</option>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                    {{ $equipo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Fecha -->
    <div>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" class="w-full border p-2 rounded" required>
    </div>

    <!-- Resultado -->
    <div>
        <label for="resultado">Resultado:</label>
        <input type="text" name="resultado" id="resultado" value="{{ old('resultado') }}" placeholder="Ej: 2-1" class="w-full border p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
</form>
