<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuizyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('big_questions')->insert([
            'name' => '東京の難読地名クイズ',
        ]);
        DB::table('big_questions')->insert([
            'name' => '広島の難読地名クイズ',
        ]);

        DB::table('questions')->insert([
            'big_question_id' => 1,
            'image' => 'img/takanawa.png',
        ]);
        DB::table('questions')->insert([
            'big_question_id' => 1,
            'image' => 'img/kameido.png',
        ]);
        DB::table('questions')->insert([
            'big_question_id' => 2,
            'image' => 'img/mukainada.png',
        ]);

        DB::table('choices')->insert([
            'question_id' => 1,
            'name' => 'たかなわ',
            'valid' => 1,
        ]);
        DB::table('choices')->insert([
            'question_id' => 1,
            'name' => 'たかわ',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 1,
            'name' => 'こうわ',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 2,
            'name' => 'かめと',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 2,
            'name' => 'かめど',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 2,
            'name' => 'かめいど',
            'valid' => 1,
        ]);
        DB::table('choices')->insert([
            'question_id' => 3,
            'name' => 'むこうひら',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 3,
            'name' => 'むきひら',
            'valid' => 0,
        ]);
        DB::table('choices')->insert([
            'question_id' => 3,
            'name' => 'むかいなだ',
            'valid' => 1,
        ]);

    }
}
