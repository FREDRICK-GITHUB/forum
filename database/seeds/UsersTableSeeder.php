<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')   
        ]);

        App\User::create([
            'name' => 'fredrick',
            'password' => bcrypt('fredrick'),
            'email' => 'fredrick@gmail.com',
            'avatar' => asset('avatars/avatar.png')   
        ]);
    }
}
