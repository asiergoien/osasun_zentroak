<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'userId'=>'1',
            'zentroarenKodea'=>'abetxuko',
            'mensaje'=>'oso polita',
        ]);
        DB::table('comments')->insert([
            'userId'=>'2',
            'zentroarenKodea'=>'abetxuko',
            'mensaje'=>'egun on',
        ]);
    }
}
