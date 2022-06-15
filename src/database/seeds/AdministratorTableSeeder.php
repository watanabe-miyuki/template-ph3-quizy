<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('administrators')->insert([
            'name' => 'admin',
            'userid' => 'userid',
            'password' => Hash::make('password'),
        ]);
    }
}
