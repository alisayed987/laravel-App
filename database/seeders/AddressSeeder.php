<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([

            'street' => 'mAsR,W El sodan St.', //:::/(^[-A-Za-z.,\/ ]+$)/'
            'building_num' =>  '9a /.', //:::/(^[ ]*[0-9]+[A-Za-z]*$)/',
            'floor' => Str::random(10),
            'apartment_num' => Str::random(10),
            'user_id' => rand(1, 3),
            'area_id' => rand(1, 3)
        ]);
    }
}
