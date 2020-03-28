<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $names = [
            ['name'=>'Sports'],
            ['name'=>'local'],
            ['name'=>'World'],
            ['name'=>'Gaming'],
            ['name'=>'Techology'],
            ['name'=>'Health'],
            ['name'=>'Cele']
        ];

        foreach($names as $name) {
            $category = new Category();
            $category->name = $name['name'];
            $category->description = $faker->text('100') ;
            
            $category->save();
        }
    }
}
