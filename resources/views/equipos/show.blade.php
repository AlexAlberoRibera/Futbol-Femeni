@extends('layouts.app')
@section('title', "Detalle de Equipo")

@section('content')
<x-equip :nombre="$equipo['nombre']" :estadio="$equipo['estadio']" :titulos="$equip['titulos']"/>
@endsection