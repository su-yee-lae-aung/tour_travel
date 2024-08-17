<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([AdminSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([TourSeeder::class]);
        $this->call([TagsTableSeeder::class]);
        $this->call([PaymentsSeeder::class]);
        $this->call([PackagesTableSeeder::class]);
    }
}