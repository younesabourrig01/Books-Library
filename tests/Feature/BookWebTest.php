<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class)->group('web-crud');

it('lists books on the web page', function () {
    Book::factory()->count(2)->create();

    $response = $this->get('/book');

    $response->assertStatus(200);
    $response->assertViewIs('book.index');
    $response->assertViewHas('books');
});

it('shows the create book form', function () {
    $response = $this->get(route('addBook'));

    $response->assertStatus(200);
    $response->assertViewIs('book.create');
});

it('stores a new book from the web form', function () {
    $response = $this->post(route('book.store'), [
        'designation'  => 'Test Book',
        'auteur'       => 'Test Author',
        'prix'         => 19.99,
        'editeur'      => 'Test Publisher',
        'description'  => 'Test Description',
    ]);

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('books', [
        'designation' => 'Test Book',
        'auteur'      => 'Test Author',
    ]);
});

it('shows the edit book form', function () {
    $book = Book::factory()->create();

    $response = $this->get(route('book.edit', $book->id));

    $response->assertStatus(200);
    $response->assertViewIs('book.edit');
});

it('updates an existing book from the web form', function () {
    $book = Book::factory()->create(['designation' => 'Old Title']);

    $response = $this->put(route('book.update', $book->id), [
        'designation' => 'New Title',
        'auteur'      => 'New Author',
        'prix'        => 25.00,
        'type'        => 'Novel',
    ]);

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('books', [
        'id'          => $book->id,
        'designation' => 'New Title',
        'auteur'      => 'New Author',
        'type'        => 'Novel',
    ]);
});

it('deletes a book from the web page', function () {
    $book = Book::factory()->create();

    $response = $this->delete(route('destroyBook', $book->id));

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
