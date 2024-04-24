<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create([
            "name" => "Guney Dirim",
            "email" => "guneydirim@gmail.com",
            "password" => Hash::make("75787578"),
            "role" => "admin"
        ]);
        User::create([
            "name" => "Korkut Sarıçayır",
            "email" => "korkut@3sgrup.com",
            "password" => Hash::make("03112015"),
            "role" => "admin"
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
