<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class equipoCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_equipos_responde()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($user)->get('/equipos');

        $response->assertStatus(200);
        $response->assertSee('Listado de equipos');
    }
}
