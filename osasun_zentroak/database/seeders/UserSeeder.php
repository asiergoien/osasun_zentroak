<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
            'name'=>'zuzenketa',
            'email'=>'zuzenketa@gmail.com',
            'password'=>Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name'=>'user1',
            'email'=>'user1@gmail.com',
            'password'=>Hash::make('123456789'),
        ]);
    }
}
