<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateBookTest extends DuskTestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_book_via_api()
    {
        $payload = [
            'designation' => 'Dusk API Book',
            'auteur' => 'Dusk Author',
            'prix' => 9.99,
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->postJson('/api/books', $payload);
        
        $response->assertStatus(201)
                 ->assertJsonPath('data.designation', 'Dusk API Book');
    }
}
