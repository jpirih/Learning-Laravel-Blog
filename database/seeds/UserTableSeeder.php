<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = Role::where('name', 'User')->first();


        $user = new User();
        $user->first_name = 'Palcek';
        $user->last_name = 'Smuk';
        $user->nickname = 'psmuk';
        $user->email = "p.smuk@gmail.com";
        $user->password = bcrypt('palceksmuk');
        $user->save();
        $user->roles()->attach($roleUser);

    }
}
