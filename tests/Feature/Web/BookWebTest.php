<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(Tests\TestCase::class, RefreshDatabase::class)->group('Feature');

it('can create a book via web form', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/books', [
        'designation' => 'Web Book',
        'auteur'      => 'Web Author',
        'prix'        => 12.5,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('books', [
        'designation' => 'Web Book',
        'auteur'      => 'Web Author',
    ]);
});

it('can view a book list via web', function () {
    Book::factory()->count(3)->create();
    $response = $this->get('/book');
    $response->assertOk();
    $response->assertSee('Tous les livres'); // ensure page contains title
});

it('can update a book via web', function () {
    $book = Book::factory()->create();
    $response = $this->put('/books/' . $book->id, [
        'designation' => 'Updated Web Title',
        'auteur'      => $book->auteur,
        'prix'        => $book->prix,
    ]);
    $response->assertRedirect();
    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'designation' => 'Updated Web Title',
    ]);
});

it('can delete a book via web', function () {
    $book = Book::factory()->create();
    $response = $this->delete('/destroyBook/' . $book->id);
    $response->assertRedirect();
    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
