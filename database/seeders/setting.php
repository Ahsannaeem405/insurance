<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert([

            ['p_name' => "Test package",'p_cost'=>'100','p_days'=>'30'],

        ]);
    }
}
