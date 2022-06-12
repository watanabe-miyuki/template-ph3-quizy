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
        foreach ($questions as $q) {
            $q['choices'] = Question::find($q['id'])->choices;
        foreach($q['choices'] as $c){
            if($c['valid']===1){
            $q['answer'] = $c;
            }
        }
    }

        // dd($questions->toArray());
        return view('quiz', compact('questions'));
    }

    public function admin()
    {
        $big_questions=Big_question::get();
        foreach($big_questions as $b_q){
        $b_q['questions'] = Big_question::find($b_q['id'])->questions;
        }
        // dd($big_questions);
        return view('admin', compact('big_questions'));
    }
    public function big_add()
    {
        return view('big_add');
    }
    public function add($id)
    {
        return view('add',  compact('id'));
    }
    // add=create
    public function store(Request $request, $id)
    {
        // 画像フォームでリクエストした画像情報を取得
        $img = $request->file('img_path');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');
        // DBに登録する処理
        Question::insertGetId([
            'big_question_id' => $id,
            'image' => $path,
        ]);
        return redirect()->route('admin');
    }
    public function delete(){
        return view('delete');
    }
}
