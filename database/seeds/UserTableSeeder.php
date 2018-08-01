<?php

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
        $users =
        [
            [
                'name' => 'Nguyen Hoang Duy',
                'email' => 'duy@gmail.com',
                'password' => Hash::make('poulscholes'),
                'role' => 10
            ],
            [
                'name' => 'Nguyen Thanh Don',
                'email' => 'don@gmail.com',
                'password' => Hash::make('poulscholes'),
                'role' => 10
            ]
        ];
        DB::table('users')->insert($users);
    }
}
