<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Landing;
use App\Models\Product;
use App\Models\User;
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

            Group::create([
                "name" => "group-" . $i,
                "link" => "grouplink-" . $i
            ]);

            Product::create(
                [
                    "name" => "Product-" . $i,
                    "description" => "Random description" . $i,
                    "image" => "",
                    "link" => "#",
                    "price" => $i * 1000,
                    "stock" => $i,
                    "group_id" => $i + 1

                ]
            );

            User::create(
                [
                    "name" => "user-" . $i,
                    "email" => $i . "@user.com",
                    "address" => "valami cím. " . $i,
                    "phone" => "+" . $i . "/" . random_int(111111111, 999999999),
                    "password" => bcrypt("password"),
                ]
            );
        }
        User::create(
            [
                "name" => "admin",
                "email" => "admin@admin.com",
                "address" => "admin 420.",
                "phone" => "+32718812373",
                "password" => bcrypt("password"),
                "is_admin" => true,
            ]
        );

        Landing::create(
            [
                "name" => "Kapcsolat",
                "Lead" => "Kapcsolat",
                "content" => "Kapcsolati oldal szövege",
                "place" => "both",
                "url" => "kapcsolat"
            ]
        );
        Landing::create(
            [
                "name" => "Rólunk",
                "Lead" => "Rólunk",
                "content" => "Rólunk oldal szövege",
                "place" => "both",
                "url" => "rolunk"
            ]
        );
        Landing::create(
            [
                "name" => "order-success",
                "Lead" => "Sikeres rendelés",
                "content" => "Sikeres rendelés szöveg",
            ]
        );
        Landing::create(
            [
                "name" => "ÁSZF",
                "Lead" => "Általános szerződési feltételek",
                "content" => "ÁSZF szöveg",
                "place" => "footer",
                "url" => "aszf"
            ]
        );
        Landing::create(
            [
                "name" => "GDPR",
                "Lead" => "GDPR",
                "content" => "GDPR szöveg",
                "place" => "footer",
                "url" => "gdpr"
            ]
        );
    }
}
