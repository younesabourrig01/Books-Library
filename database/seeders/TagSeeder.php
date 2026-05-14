<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Bestseller',
            'New Arrival',
            'Classic',
            'Award Winner',
            'Must Read',
            'Summer Reading',
            'Gift Idea',
            'Staff Pick',
            'Limited Edition',
            'Discontinued',
        ];

        foreach ($tags as $tag) {
            Tags::create(['name' => $tag]);
        }
    }
}
