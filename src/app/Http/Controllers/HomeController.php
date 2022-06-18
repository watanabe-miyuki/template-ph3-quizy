<?php

namespace App\Http\Controllers;

use App\Record;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // PieChart_data START
        $records = Record::where('user_id', $user['id'])->whereBetween("date", ['2022-6-1', '2022-6-30'])->selectRaw('
        N*time/(N + dotInstall + POSSE) AS N, 
        dotInstall*time/(N + dotInstall + POSSE) AS dotInstall, 
        POSSE*time/(N + dotInstall + POSSE) AS POSSE, 
        HTML*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS HTML,
        CSS*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS CSS,
        JavaScript*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS JavaScript,
        PHP*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS PHP,
        ＳＱＬ*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS ＳＱＬ,
        Laravel*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS Laravel,
        SHELL*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS SHELL,
        other*time/(HTML + CSS + JavaScript + PHP + ＳＱＬ + Laravel + SHELL + other) AS other')->get()->toArray();

        // 参考https://teratail.com/questions/45703
        function arraySum(array $arr)
        {
            $res = [];
            if (is_array($arr)) {
                foreach ($arr as $val) {
                    foreach ($val as $k => $v) {
                        if (isset($res[$k])) {
                            $res[$k] += $v;
                        } else {
                            $res[$k] = $v;
                        }
                    }
                }
            }
            return $res;
        }
        $PieChart_data = arraySum($records);
        // dd($PieChart_data['HTML']);
        // PieChart_data END

        // BarChart_data START
        $BarChart_data = Record::where('user_id', $user['id'])
            ->whereBetween("date", ['2022-6-1', '2022-6-30'])
            ->select('date')
            ->selectRaw('SUM(time) AS total_time')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()->toArray();
        // dd($BarChart_data);
        // BarChart_data END

        // Today START
        $Today = Record::where('user_id', $user['id'])
            ->where("date", '2022-6-30')
            ->select('time')
            ->get();
        // dd($Today[0]['time']);
        // Today END

        // Month START
        $Month = Record::where('user_id', $user['id'])
            ->whereBetween("date", ['2022-6-1', '2022-6-30'])
            ->selectRaw('SUM(time) AS total_time')
            ->first();
        // dd($Month['total_time']);
        // Month END

        // Total START
        $Total = Record::where('user_id', $user['id'])
            ->selectRaw('SUM(time) AS total_time')
            ->first();
        // dd($Total['total_time']);
        // Total END

        return view('home', compact('PieChart_data', 'BarChart_data', 'Today' ,'Month', 'Total'));
    }
}
