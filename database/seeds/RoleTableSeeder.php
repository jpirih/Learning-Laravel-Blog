<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = new Role();
        $roleUser->name = 'User';
        $roleUser->description = "Regular user with no special privileges";
        $roleUser->save();

        $roleAuthor = new Role();
        $roleAuthor->name = "Author";
        $roleAuthor->description = "Author writes and changes blog articles";
        $roleAuthor->save();

        $roleAdmin = new Role();
        $roleAdmin->name = "Anmin";
        $roleAdmin->description = "Site admin he is the boss";
        $roleAdmin->save();

    }
}
