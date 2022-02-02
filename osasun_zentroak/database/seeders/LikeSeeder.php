<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'userId'=>'1',
            'zentroarenKodea'=>'abetxuko',
        ]);
        DB::table('likes')->insert([
            'userId'=>'1',
            'zentroarenKodea'=>'agurain_salvatierra',
        ]);
        DB::table('likes')->insert([
            'userId'=>'2',
            'zentroarenKodea'=>'abetxuko',
        ]);
        DB::table('likes')->insert([
            'userId'=>'2',
            'zentroarenKodea'=>'agurain_salvatierra',
        ]);
    }
}
