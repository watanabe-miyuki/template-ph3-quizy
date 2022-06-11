<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Big_question;
use App\Question;

class HomeController extends Controller
{
    //
    public function index()
    {
        $big_questions = Big_question::all();
        return view('index', compact('big_questions'));
}
    public function quiz($id)
    {
        $questions = Big_question::find($id)->questions;
        foreach($questions as $q){
        $q['choices'] = Question::find($q['id'])->choices;
        }
        // dd($questions);
        return view('quiz', compact('questions'));
}

    public function admin()
    {
        return view('admin');
}
    public function big_add()
    {
        return view('big_add');
}
    public function add()
    {
        return view('add');
}
    public function delete($id)
    {
        return view('delete');
}

}
