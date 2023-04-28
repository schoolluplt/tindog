<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Lucie Pelletier',
             'email' => 'luluadmin@gmail.com',
             'password' => bcrypt('password'),
             'is_admin' => true,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Lucie User',
            'email' => 'lulu@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);
    }
}
