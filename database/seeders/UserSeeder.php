<?php

namespace Database\Seeders;

use App\Models\AppUsers;
use Illuminate\Database\Seeder;
use Faker\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $sifra=md5('sifra1');
        $now=date('Y-m-d H:i:s');


        $users=[
            [
                'Lazar','Galic','lazar@gmail.com','lazar123', '0692504085', $sifra, 1, 2, 1,200, 1, $now, null, null
            ],
            [
                'Lazar2','Galic2','lazar2@gmail.com','lazar1234', '0692504087', $sifra, 1, 1, 1,200, 1, $now, null, null
            ]
        ];

        //$faker=Factory::create();



        for($i=0;$i<2;$i++){
                AppUsers::create([
                    'first_name' => $users[$i][0],
                    'last_name' => $users[$i][1],
                    'email' => $users[$i][2],
                    'username' => $users[$i][3],
                    'mobile' => $users[$i][4],
                    'password' => $users[$i][5],
                    'gender_id' => $users[$i][6],
                    'role_id' => $users[$i][7],
                    'country_id' => $users[$i][8],
                    'tokens_available' => $users[$i][9],
                    'last_view' => $users[$i][10],
                    'created_at'=>$users[$i][11],
                    'deleted_at'=>$users[$i][12],
                    'last_updated_at'=>$users[$i][13]
                ]);

        }


    }
}
