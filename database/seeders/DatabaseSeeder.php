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
        $this->call(PermissionsDemoSeeder::class);
        $this->call(EditorialSeeder::class);
        $this->call(AutorSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(BookSeeder::class);
    }
}
