<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $myRoles=['user', 'admins'];

        for($i=0;$i<2;$i++){

            Role::create([
                'name_role'=>$myRoles[$i],

            ]);
        }
    }
}
