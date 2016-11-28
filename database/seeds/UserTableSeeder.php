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
        $roleAuthor = Role::where('name', 'Author')->first();
        $roleAdmin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Palcek Smuk';
        $user->email = "p.smuk@gmail.com";
        $user->password = bcrypt('palceksmuk');
        $user->save();
        $user->roles()->attach($roleUser);

        $author = new User();
        $author->name = "Erik Banananjam";
        $author->email = "e.banananjam@gmail.com";
        $author->password = bcrypt('banananjam');
        $author->save();
        $author->roles()->attach($roleAuthor);

        $admin = new User();
        $admin->name = 'Supe Man';
        $admin->email = "superman@gmail.com";
        $admin->password = bcrypt('superman');
        $admin->save();
        $admin->roles()->attach($roleAdmin);
    }
}
