<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([


           'name' => 'user',
            'email' => 'user@laravel.com',
            'password' => Hash::make('omar.1.1.1'),
            'image'=>'uploads\profilepics\user-image.png',
            'type'=>'user'
                ]
            );
    }
}
