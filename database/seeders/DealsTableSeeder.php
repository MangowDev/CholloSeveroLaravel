<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deals')->insert([
            'title' => 'The Witcher 3',
            'price' => 67.99,
            'previous_price' => 35.99,
            'rating' => 4.5,
            'description' => 'The Witcher 3: Wild Hunt es un videojuego de rol desarrollado y publicado por la compañía polaca CD Projekt RED. Esta compañía es la desarrolladora mientras que la distribución corre a cargo de la Warner Bros.',
            'category' => 'Videogames',
            'image' => 'https://image.api.playstation.com/vulcan/ap/rnd/202211/0714/S1jCzktWD7XJSRkz4kNYNVM0.png',
            'url' => 'https://chollometro.com/witcher3',
            'shop' => 'Mediamarkt',
            'available' => true,
            'user_id' => 1,
        ]);

        DB::table('deals')->insert([
            'title' => 'Forza Horizon 5',
            'price' => 79.99,
            'previous_price' => 50.99,
            'rating' => 4,
            'description' => 'Forza Horizon 5 es un videojuego de carreras multijugador en línea desarrollado por Playground Games y publicado por Xbox Game Studios.',
            'category' => 'Videogames',
            'image' => 'https://image.api.playstation.com/vulcan/ap/rnd/202501/2717/42b3ee6b1b2094212231b0b0a82824f687fc5c4dc9bde31c.png',
            'url' => 'https://chollometro.com/forza',
            'shop' => 'Amazon',
            'available' => true,
            'user_id' => 2,
        ]);
    }
}
