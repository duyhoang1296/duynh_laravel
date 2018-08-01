<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	['name' => 'Thể thao', 'slug' => 'the-thao'],
        	['name' => 'Kinh tế', 'slug' => 'kinh-te'],
        	['name' => 'Chính trị', 'slug' => 'chinh-tri'],
        	['name' => 'Giải trí', 'slug' => 'giai-tri'],
        	['name' => 'Pháp luật', 'slug' => 'phap-luat']
        ];
        DB::table('categories')->insert($categories);
    }
}
