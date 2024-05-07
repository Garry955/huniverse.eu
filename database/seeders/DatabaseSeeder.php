<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 10; $i++) {
            Product::create(
                [
                    "name" => "Product-" . $i,
                    "description" => "Random description" . $i,
                    "image" => "",
                    "link" => "#",
                    "price" => $i * 1000,
                    "stock" => $i

                ]
            );
        }
    }
}
