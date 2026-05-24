<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(Tests\TestCase::class, RefreshDatabase::class)->group('Feature');

beforeEach(function () {
    Sanctum::actingAs(User::factory()->create());
});

it('lists all books via api', function () {
    Book::factory()->count(3)->create();

    $response = $this->getJson('/api/books');

    $response->assertStatus(200)
             ->assertJsonStructure([
                 'success',
                 'data' => [
                     '*' => [
                         'id', 'designation', 'auteur', 'prix'
                     ]
                 ]
             ]);
});

it('stores a new book via api', function () {
    $response = $this->postJson('/api/books', [
        'designation' => 'API Book',
        'auteur'      => 'API Author',
        'prix'        => 15.50,
        'type'        => 'Fiction',
    ]);

    $response->assertStatus(201)
             ->assertJson([
                 'success' => true,
                 'message' => 'book added successfully'
             ]);

    $this->assertDatabaseHas('books', [
        'designation' => 'API Book',
        'auteur'      => 'API Author',
    ]);
});

it('shows a specific book via api', function () {
    $book = Book::factory()->create();

    $response = $this->getJson('/api/books/' . $book->id);

    $response->assertStatus(200)
             ->assertJson([
                 'success' => true,
                 'data' => [
                     'id'          => $book->id,
                     'designation' => $book->designation,
                 ]
             ]);
});

it('updates a book via api', function () {
    $book = Book::factory()->create();

    $response = $this->putJson('/api/books/' . $book->id, [
        'designation' => 'Updated API Title',
        'auteur'      => 'Updated API Author',
        'prix'        => 20.00,
        'type'        => 'Non-Fiction',
    ]);

    $response->assertStatus(200)
             ->assertJson([
                 'success' => true,
                 'data' => [
                     'designation' => 'Updated API Title',
                 ]
             ]);

    $this->assertDatabaseHas('books', [
        'id'          => $book->id,
        'designation' => 'Updated API Title',
        'type'        => 'Non-Fiction',
    ]);
});

it('deletes a book via api', function () {
    $book = Book::factory()->create();

    $response = $this->deleteJson('/api/books/' . $book->id);

    $response->assertStatus(200)
             ->assertJson([
                 'success' => true,
                 'message' => 'Book deleted successfully'
             ]);

    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});
