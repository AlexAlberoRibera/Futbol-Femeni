<nav>
  <ul class="flex space-x-4">
    <li><a class="text-white hover:underline" href="/">Inicio</a></li>
    <li><a class="text-white hover:underline" href="{{ route('equipos.index') }}">Guia de Equipos</a></li>
    <li><a class="text-white hover:underline" href="{{ route('estadios.index') }}">Listado de Estadios</a></li>
    <li><a class="text-white hover:underline" href="{{ route('partidos.index') }}">Listado de Partidos</a></li>

  </ul>
</nav>
/*<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title','Guia de futbol femenino')</title>
  @vite(['resources/css/app.css' ])
</head>
<body class="font-sans bg-gray-100 text-gray-900">
  <header class="bg-blue-800 text-white p-4">
    @include('partials.menu')
  </header>
  <main class="container mx-auto p-6">
    @yield('content')
  </main>
  <footer class="bg-blue-800 text-white text-center p-4">
    <p>&copy; 2025 Guia de Futbol Femenino</p>
  </footer>
</body>
</html>