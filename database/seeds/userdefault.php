<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userdefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name'     =>'Agustín Eliseo López Matías',
          'email'    =>'admin_agustin',
          'password' =>bcrypt('13269018'),
          'role_id'  =>2,
          ]);

        DB::table('users')->insert([
          'name'     =>'default',
          'email'    =>'user',
          'password' =>bcrypt('123456'),
          'role_id'  =>1,
          ]);
    }
}
