<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Artem Lebedev',
            'email'    => 'art.lebedev2020@gmail.com',
            'password'   =>  Hash::make('124468'),
            'remember_token' =>  str_random(10),
        ]);
    }
}
