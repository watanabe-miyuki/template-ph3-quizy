<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Big_question;


class IndexController extends Controller
{
    public function index()
    {
            $big_questions=Big_question::get();
            foreach($big_questions as $b_q){
            $b_q['questions'] = Big_question::find($b_q['id'])->questions;
            }
            // dd($big_questions);
            return view('admin.index', compact('big_questions'));
    }
}