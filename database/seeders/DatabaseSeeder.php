<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            \App\Models\Customer::factory(100)->create();
            \App\Models\Supplier::factory(10)->create();
            \App\Models\Ekspedisi::factory(3)->create();
            \App\Models\Jasa::factory(3)->create();
            \App\Models\Category::factory(3)->create();
            \App\Models\Stock::factory(10)->create();
        }

        \App\Models\User::factory(1)->create();
        \App\Models\Company::factory(1)->create();
    }
}
