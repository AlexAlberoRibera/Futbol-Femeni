<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadioController extends Controller
{
    public function index(Request $request)
    {
        // Cargar los estadios desde la sesión o inicializarlos si no existen
        $estadios = $request->session()->get('estadios', [
            ['nombre' => 'Estadio Johan Cruyff', 'ciudad' => 'Sant Joan Despí', 'capacidad' => 6000, 'equipo_principal' => 'FC Barcelona Femenino'],
            ['nombre' => 'Centro Deportivo Wanda Alcalá de Henares', 'ciudad' => 'Alcalá de Henares', 'capacidad' => 2800, 'equipo_principal' => 'Atlético de Madrid Femenino'],
            ['nombre' => 'Estadio Alfredo Di Stéfano', 'ciudad' => 'Madrid', 'capacidad' => 6000, 'equipo_principal' => 'Real Madrid Femenino'],
        ]);

        // Guardar los estadios en la sesión (por si es la primera carga)
        $request->session()->put('estadios', $estadios);

        return view('estadios.index', compact('estadios'));
    }

    public function create()
    {
        return view('estadios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'ciudad' => 'required|min:2',
            'capacidad' => 'required|integer|min:0',
            'equipo_principal' => 'required|min:3'
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'integer' => 'El campo :attribute debe ser un número entero.'
        ]);

        // Añadir el nuevo estadio a la sesión
        $estadios = $request->session()->get('estadios', []);
        $estadios[] = $validated;
        $request->session()->put('estadios', $estadios);

        return redirect()->route('estadios.index')->with('success', 'Estadio añadido correctamente.');
    }
}
