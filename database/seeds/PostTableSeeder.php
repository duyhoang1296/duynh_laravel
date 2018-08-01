<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100 ; $i++) { 
        	$title = $faker->realText($maxNbChars = 100, $indexSize = 1);
        	$posts =[
        		'title'=>$title,
        		'slug'=>str_slug($title),
        		'featured'=> $faker->imageUrl($width = 640, $height = 480),
        		'content'=> $faker->realText($maxNbChars = 500, $indexSize = 4),
        		'category_id'=>rand(1,5)
        	];
        	DB::table('posts')->insert($posts);
        }
    }
}
