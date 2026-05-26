<?php

use App\Models\Book;
use App\Models\User;
use Laravel\Dusk\Browser;

test('an authenticated api user can create a book', function () {
    $user = User::factory()->create();
    $token = $user->createToken('dusk-api-create-test')->plainTextToken;
    $title = 'Dusk API Book ' . uniqid();

    $this->browse(function (Browser $browser) use ($token, $title) {
        $response = $browser->visit('/')
            ->driver
            ->executeAsyncScript(<<<'JS'
                const [token, title, done] = arguments;

                fetch('/api/books', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`,
                    },
                    body: JSON.stringify({
                        designation: title,
                        auteur: 'Dusk API Author',
                        prix: 35.75,
                        type: 'Dusk API Type',
                        description: 'Created by a Laravel Dusk API test.'
                    }),
                })
                    .then(async response => done({
                        status: response.status,
                        body: await response.json(),
                    }))
                    .catch(error => done({
                        status: 0,
                        body: { message: error.message },
                    }));
            JS, [$token, $title]);

        expect($response['status'])->toBe(201);
        expect($response['body']['success'])->toBeTrue();
        expect($response['body']['message'])->toBe('book added successfully');
        expect($response['body']['data']['designation'])->toBe($title);
    });

    expect(Book::where('designation', $title)
        ->where('auteur', 'Dusk API Author')
        ->exists())->toBeTrue();

    Book::where('designation', $title)->delete();
    $user->tokens()->delete();
    $user->delete();
});
