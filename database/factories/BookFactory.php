<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
return [
        'designation' => $this->faker->unique()->sentence(3),
        'description' => $this->faker->paragraph(),
        'tag_id' => \App\Models\Tags::inRandomOrder()->first()->id ?? null,
        'langue' => $this->faker->randomElement(['Arabe', 'Francais', 'Anglais', 'Espagnol',
        'Allemand']),
        'editeur' => $this->faker->company(),
        'category_id' => \App\Models\Caterories::inRandomOrder()->first()->id ?? null,
        'prix' => $this->faker->randomFloat(2, 0, 900),
        'auteur' => $this->faker->name(),
        'cover' => 'no_cover.jpg',
];
}

}
