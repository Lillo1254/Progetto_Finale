<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            'Auto',
            'Elettronica',
            'Casa',
            'Sport',
            'Abbigliamento',
            'Arredamento',
            'Vintage',
            'Musica',
            'Fai da te',
            'Libri'
        ];

        foreach ($categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}
