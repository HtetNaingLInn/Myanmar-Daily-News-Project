<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 20; $i++) { 
            $post = new Post();
            $post->title = $faker->text('10');
            $post->description = $faker->text('1000');
            $post->category_id = rand(1,7);
            $post->save();
        }
    } 
}
