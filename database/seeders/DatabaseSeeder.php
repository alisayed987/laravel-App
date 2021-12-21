<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use App\Models\State;
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
        State::factory(5)->create();
        City::factory(5)->create();
        Area::factory(10)->create();
        // $this->call([
        //     StateSeeder::class,
        //     CitySeeder::class,
        //     AreaSeeder::class

        // ]);
    }
}
