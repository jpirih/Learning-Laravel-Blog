<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testing = new Category();
        $testing->name = 'Testi';
        $testing->save();

        $freeTime = new Category();
        $freeTime->name = "Prosti čas";
        $freeTime->save();

        $dev = new Category();
        $dev->name = "Development";
        $dev->save();
    }
}
