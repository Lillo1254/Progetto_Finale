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
            ['name' => 'Auto', 'description' => 'Auto e moto'],
            ['name' => 'Elettronica','description' => 'Elettronica'],
            ['name' => 'Casa', 'description' => 'Casa'],
            ['name' => 'Sport', 'description' => 'Sport'],
            ['name' =>'Abbigliamento','description' => 'Abbigliamento'],
            ['name' =>'Arredamento', 'description' => 'Arredamento'],
           [ 'name' =>'Vintage', 'description' => 'Vintage'],
           [ 'name' =>'Musica', 'description' => 'Musica'],
           ['name' => 'Fai da te', 'description' => 'Fai da te'],
            ['name' =>'Libri', 'description' => 'Libri']        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category['name'], 'description' => $category['description']]);
        }
    }
}
