<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Category;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Factory::create();

        for($i=0; $i<5; $i++) {

            Category::create([
                'name_category'=>$faker->creditCardType(),
                'deleted_at'=>null
            ]);
        }

    }
}
