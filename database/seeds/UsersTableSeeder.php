<?php

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

        //insert default value into users table
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'mishajib222@gmail.com',
            'password' => bcrypt('i am back'),
        ]);
    }
}
