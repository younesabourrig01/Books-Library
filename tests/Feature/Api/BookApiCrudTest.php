<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(Tests\TestCase::class, RefreshDatabase::class)->group('Feature');

it('can create a book via API', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $payload = [
        'designation' => 'API Book',
        'auteur' => 'API Author',
        'prix' => 15.5,
        'type' => 'Fiction', 
    ];

    $response = $this->postJson('/api/books', $payload);
    $response->assertStatus(201)
             ->assertJsonPath('data.designation', 'API Book');

    $this->assertDatabaseHas('books', ['designation' => 'API Book']);
});

it('can list books via API', function () {
    Sanctum::actingAs(User::factory()->create());
    Book::factory()->count(3)->create();
    $response = $this->getJson('/api/books');
    $response->assertOk()
            ->assertJsonCount(3, 'data');
});

it('can update a book via API', function () {
    Sanctum::actingAs(User::factory()->create());
    $book = Book::factory()->create();
    $payload = ['designation' => 'Updated API Book'];
    $response = $this->putJson("/api/books/{$book->id}", $payload);
    $response->assertOk();
    $this->assertDatabaseHas('books', ['id' => $book->id, 'designation' => 'Updated API Book']);
});

it('can delete a book via API', function () {
    Sanctum::actingAs(User::factory()->create());
    $book = Book::factory()->create();
    $response = $this->deleteJson("/api/books/{$book->id}");
    $response->assertOk()
             ->assertJson(['success' => true]);
    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
