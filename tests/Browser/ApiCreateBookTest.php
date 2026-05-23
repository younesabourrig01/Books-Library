<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;

class ApiCreateBookTest extends DuskTestCase
{
    #[Test]
    public function user_can_create_book_via_api()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $payload = [
            'designation' => 'Dusk API Book',
            'auteur' => 'Dusk API Author',
            'prix' => 12.34,
            'type' => 'Fiction',
        ];

        $response = $this->postJson('/api/books', $payload);
        $response->assertStatus(201)
                 ->assertJsonPath('data.designation', 'Dusk API Book');

        $this->assertDatabaseHas('books', ['designation' => 'Dusk API Book']);
    }
}
