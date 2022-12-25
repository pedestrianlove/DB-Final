<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       \App\Models\Employee::factory(25)->create();
        \App\Models\Nation::factory(15)->create();
        \App\Models\Dependent::factory(30)->create();
        \App\Models\Expat::factory(25)->create();

    }
}
