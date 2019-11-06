<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('secret'),
            'dob'=>'1995-06-09',
            'phone'=>'095463721',
            'role'=>'1',
            ]);
    }
}
