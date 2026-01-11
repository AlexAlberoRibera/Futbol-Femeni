<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Models
use App\Models\Jugadora;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Estadio;

// Policies
use App\Policies\JugadoraPolicy;
use App\Policies\PartidoPolicy;
use App\Policies\equipoPolicy;
use App\Policies\EstadioPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Jugadora::class => JugadoraPolicy::class,
        Partido::class => PartidoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
