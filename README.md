# 🧠 Laravel - Cheat Sheet (Dentro del Contenedor Sail)

## 🚀 Acceso al contenedor

```bash
./vendor/bin/sail root-shell
# Una vez dentro, usar directamente:
php artisan ...
```

---

## 🗄️ Base de datos

### Migraciones

```bash
php artisan migrate                  # Ejecutar todas las migraciones
php artisan migrate:fresh --seed      # Borrar todas las tablas y ejecutar seeders
php artisan migrate:rollback           # Deshacer la última migración
```

### Seeders

```bash
php artisan db:seed                    # Ejecutar seeders
```

---

## 🧱 Generadores

### Modelos + Migraciones

```bash
php artisan make:model Equipo -m
php artisan make:model Estadio -m
php artisan make:model Partido -m
php artisan make:model Jugadora -m
```

### Controladores

```bash
php artisan make:controller EquipoController --resource
php artisan make:controller EstadioController --resource
php artisan make:controller PartidoController --resource
php artisan make:controller JugadoraController --resource
```

### Form Requests

```bash
php artisan make:request StoreEquipoRequest
php artisan make:request StoreEstadioRequest
php artisan make:request PartidoRequest
```

### Policies y Autorización

```bash
php artisan make:policy EquipoPolicy --model=Equipo
php artisan make:provider AuthServiceProvider
```

### Livewire

```bash
php artisan make:livewire HistorialPartidos
```

---

## 🧪 Debug y desarrollo

```bash
php artisan tinker         # Consola interactiva
php artisan --version      # Versión de Laravel
php artisan list           # Lista de todos los comandos
```

---

## 🧹 Caché y optimización

```bash
php artisan optimize:clear  # Limpiar todo
php artisan view:clear       # Limpiar caché de vistas
php artisan route:clear      # Limpiar caché de rutas
php artisan config:clear     # Limpiar caché de configuración
php artisan optimize         # Recompilar cachés
```

---

## 🧭 Rutas

```bash
php artisan route:list                  # Listar todas las rutas
php artisan route:list --name=partidos  # Filtrar por nombre
php artisan route:list --path=estadios  # Filtrar por ruta
```

---

## 🧑‍💻 Usuarios y Roles (en Tinker)

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);

$user = \App\Models\User::first();
$user->role = 'admin';
$user->save();
```

---

## 🛠️ Mantenimiento

```bash
php artisan down   # Activar modo mantenimiento
php artisan up     # Desactivar modo mantenimiento
```

---

## 📁 Storage

```bash
php artisan storage:link   # Crear enlace simbólico para almacenamiento
```

---

## 🔄 Flujo típico de limpieza y trabajo

```bash
php artisan migrate:fresh --seed # Reinicia la base de datos y carga los seeders.
php artisan optimize:clear #Limpia todas las cachés para evitar errores de configuración o rutas.
php artisan storage:link #Crea el enlace simbólico necesario para acceder a archivos públicos.
php artisan route:list #Verifica que todas las rutas estén cargadas correctamente.
```

---

##
