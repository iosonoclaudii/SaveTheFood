<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProductsTableSeeder extends Seeder
{
    /**
     * Esegui il seeder.
     *
     * @return void
     */
    public function run()
    {
        // Creazione di un utente di esempio
        User::firstOrCreate([
            'email' => 'user@gmail.com'
        ], [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);

        // Creazione di prodotti preimpostati
        Product::create([
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 1.20,
            'discounted_price' => 1.00,
            'store' => 'Fruit Shop',
            'city' => 'New York'
        ]);

        Product::create([
            'name' => 'Carrot',
            'type' => 'Vegetable',
            'price' => 0.80,
            'discounted_price' => 0.40,
            'store' => 'Vegetable Market',
            'city' => 'Los Angeles'
        ]);

        Product::create([
            'name' => 'Banana',
            'type' => 'Fruit',
            'price' => 1.50,
            'discounted_price' => 1.10,
            'store' => 'Tropical Store',
            'city' => 'Miami'
        ]);

        Product::create([
            'name' => 'Tomato',
            'type' => 'Vegetable',
            'price' => 1.10,
            'discounted_price' => 1.00,
            'store' => 'Green Market',
            'city' => 'Chicago'
        ]);

        Product::create([
            'name' => 'Lettuce',
            'type' => 'Vegetable',
            'price' => 0.90,
            'discounted_price' => 0.60,
            'store' => 'Healthy Foods',
            'city' => 'Houston'
        ]);

        Product::create([
            'name' => 'Orange',
            'type' => 'Fruit',
            'price' => 1.40,
            'discounted_price' => 1.00,
            'store' => 'Citrus Grove',
            'city' => 'Phoenix'
        ]);

        Product::create([
            'name' => 'Potato',
            'type' => 'Vegetable',
            'price' => 0.70,
            'discounted_price' => 0.40,
            'store' => 'Root Market',
            'city' => 'Dallas'
        ]);

        Product::create([
            'name' => 'Mango',
            'type' => 'Fruit',
            'price' => 1.80,
            'discounted_price' => 1.30,
            'store' => 'Tropical Paradise',
            'city' => 'Orlando'
        ]);

        Product::create([
            'name' => 'Broccoli',
            'type' => 'Vegetable',
            'price' => 1.00,
            'discounted_price' => 0.90,
            'store' => 'Green Leaf',
            'city' => 'San Francisco'
        ]);

        Product::create([
            'name' => 'Grapes',
            'type' => 'Fruit',
            'price' => 2.50,
            'discounted_price' => 2.30,
            'store' => 'Vineyard Goods',
            'city' => 'Napa Valley'
        ]);
    }
}
