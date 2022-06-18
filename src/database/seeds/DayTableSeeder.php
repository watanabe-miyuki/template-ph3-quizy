<?php

use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('days')->truncate();
        for ($i = 1; $i <= 31; $i++) {
            DB::table('days')->insert([
                'day' => $i,
            ]);
        }
    }
}
