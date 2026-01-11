<x-mail::message>
# Hola {{ $arbitro->name }}

Estos son los partidos que vas a arbitrar:

@foreach($partidos as $partido)
- {{ $partido->local->nombre }} vs {{ $partido->visitante->nombre }}
  - Fecha: {{ $partido->fecha }}
@endforeach

Gracias,  
{{ config('app.name') }}
</x-mail::message>
