<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => '2022-5-11',
            'email' => 'test@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
