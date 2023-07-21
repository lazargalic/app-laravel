<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $genders=['Muski', 'Zenski'];

        for($i=0;$i<2;$i++){
            Gender::create([
                'name_gender'=>$genders[$i]
            ]);

        }

    }
}
