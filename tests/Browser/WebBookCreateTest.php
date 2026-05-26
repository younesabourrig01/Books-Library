<?php

use App\Models\Book;
use Laravel\Dusk\Browser;

test('a visitor can create a book from the web form', function () {
    $title = 'Dusk Web Book ' . uniqid();

    $this->browse(function (Browser $browser) use ($title) {
        $browser->visit(route('addBook'))
            ->assertInputPresent('designation')
            ->assertInputPresent('auteur')
            ->assertInputPresent('prix')
            ->type('designation', $title)
            ->type('auteur', 'Dusk Web Author')
            ->type('editeur', 'Dusk Web Publisher')
            ->type('prix', '49.90')
            ->type('description', 'Created by a Laravel Dusk web test.')
            ->click('button[type="submit"]')
            ->waitForLocation('/book')
            ->assertPathIs('/book')
            ->assertSee($title)
            ->assertSee('Dusk Web Author');
    });

    expect(Book::where('designation', $title)->exists())->toBeTrue();

    Book::where('designation', $title)->delete();
});
