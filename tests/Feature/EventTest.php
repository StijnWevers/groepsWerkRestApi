<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class EventTest extends TestCase
{
    public function test_can_get_events()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        Event::factory()->count(3)->create();

        $response = $this->getJson('/api/events');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }
}
