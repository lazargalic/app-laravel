<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker=Factory::create();

        for($i=0;  $i<5; $i++) {

            Country::create([
                'name_country'=>$faker->country()
            ]);

        }
    }
}
