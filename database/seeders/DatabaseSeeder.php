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
        \App\Models\User::factory(1)->create();
        \App\Models\Customer::factory(1000)->create();
        \App\Models\Supplier::factory(10)->create();
        \App\Models\Ekspedisi::factory(3)->create();
        \App\Models\Jasa::factory(3)->create();
        \App\Models\Category::factory(3)->create();
    }
}
