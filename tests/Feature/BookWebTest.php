<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class)->group('Feature');

it('can display the index page with books', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    Book::factory()->count(2)->create();

    $response = $this->get('/book');

    $response->assertStatus(200);
    $response->assertViewIs('book.index');
    $response->assertViewHas('books');
});

it('can display the create book page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('addBook'));

    $response->assertStatus(200);
    $response->assertViewIs('book.create');
});

it('can store a new book', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $bookData = [
        'designation'  => 'Test Book',
        'auteur'       => 'Test Author',
        'prix'         => 19.99,
        'editeur'      => 'Test Publisher',
        'description'  => 'Test Description',
    ];

    $response = $this->post(route('book.store'), $bookData);

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('books', [
        'designation' => 'Test Book',
        'auteur'      => 'Test Author',
    ]);
});

it('can display the edit book page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $book = Book::factory()->create();

    $response = $this->get(route('book.edit', $book->id));

    $response->assertStatus(200);
    $response->assertViewIs('book.edit');
});

it('can update an existing book', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $book = Book::factory()->create(['designation' => 'Old Title']);

    $updateData = [
        'designation' => 'New Title',
        'auteur'      => 'New Author',
        'prix'        => 25.00,
        'type'        => 'Novel',
    ];

    $response = $this->put(route('book.update', $book->id), $updateData);

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('books', [
        'id'          => $book->id,
        'designation' => 'New Title',
        'auteur'      => 'New Author',
        'type'        => 'Novel',
    ]);
});

it('can delete a book', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $book = Book::factory()->create();

    $response = $this->delete(route('destroyBook', $book->id));

    $response->assertRedirect(route('book.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
