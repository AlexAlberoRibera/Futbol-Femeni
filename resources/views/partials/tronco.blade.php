@props([
    'columns' => [], // Array con nombres de columnas
    'rows' => [],    // Colección de datos
    'links' => []    // Opcional: campo => ruta para enlazar
])

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            @foreach($columns as $column)
                <th class="border border-gray-300 p-2">{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
        <tr class="hover:bg-gray-100">
            @foreach($columns as $column)
                <td class="border border-gray-300 p-2">
                    @if(isset($links[$column]))
                        <a href="{{ route($links[$column], $row->id) }}" class="text-blue-700 hover:underline">
                            {{ $row->$column }}
                        </a>
                    @else
                        {{ $row->$column }}
                    @endif
                </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
