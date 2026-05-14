<?php

namespace Database\Seeders;

use App\Models\Caterories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiction',
            'Non-Fiction',
            'Science',
            'History',
            'Biography',
        ];

        foreach ($categories as $category) {
            Caterories::create(['name' => $category]);
        }
    }
}
