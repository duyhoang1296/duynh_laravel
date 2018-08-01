<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
        	['name' => 'Người lớn', 'slug' => 'nguoi-lon'],
        	['name' => 'Sinh viên', 'slug' => 'sinh-vien'],
        	['name' => 'Khám phá', 'slug' => 'kham-pha'],
        	['name' => 'Người Việt', 'slug' => 'nguoi-viet'],
        	['name' => 'Việt kiều', 'slug' => 'viet-kieu']
        ];
        DB::table('tags')->insert($tags);
    }
}
