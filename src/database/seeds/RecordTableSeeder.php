<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->truncate();

        // 2つの日付の間のランダム日を生成する
        $start = Carbon::create("2022", "5", "1");
        $end = Carbon::create("2022", "6", "30");

        // timestampに変換する
        $min = strtotime($start);
        $max = strtotime($end);

        for ($i = 1; $i <= 40; $i++) {

            // ランダムなtimestampを取得し、フォーマット設定
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            //
            DB::table('records')->insert([
                'date' => $date,
                'user_id' => 1,
                'N' => 1,
                'dotInstall' => rand(0, 1),
                'POSSE' => rand(0, 1),
                'HTML' => 1,
                'CSS' => rand(0, 1),
                'JavaScript' => rand(0, 1),
                'PHP' => rand(0, 1),
                'SQL' => rand(0, 1),
                'Laravel' => rand(0, 1),
                'SHELL' => rand(0, 1),
                'other' => rand(0, 1),
                'time' => rand(1, 5),
            ]);
        }
    }
}
