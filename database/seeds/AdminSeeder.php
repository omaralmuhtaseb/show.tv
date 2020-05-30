<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([


                'name' => 'omar',
                'email' => 'omar@laravel.com',
                'password' => Hash::make('omar.1.1.1'),
                'image'=>'uploads\profilepics\admin-image.png',
                'type'=>'admin'
            ]
        );



    }
}
