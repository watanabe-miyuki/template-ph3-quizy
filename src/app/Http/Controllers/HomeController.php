<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Big_question;
use App\Choice;
use App\Question;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        $big_questions = Big_question::all();
        return view('index', compact('big_questions'));
    }
    public function quiz($id)
    {
        $questions = Big_question::find($id)->questions;
        $count = count($questions);
        foreach ($questions as $q) {
            $q['choices'] = Question::find($q['id'])->choices;
            foreach($q['choices'] as $c){
                if($c['valid']===1){
                $q['answer'] = $c;
                }
            }
    }

        // dd($questions->toArray());
        return view('quiz', compact('questions', 'count'));
    }

    public function admin()
    {
        $big_questions=Big_question::get();
        foreach($big_questions as $b_q){
        $b_q['questions'] = Big_question::find($b_q['id'])->questions;
        // $b_q['questions'] = Big_question::find($b_q['id'])->questions->orderBy('order', 'ASC');

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
        // question_id= $idの数＋1がorder
        $questions = Big_question::find($id)->questions;
        $order = count($questions)+1;

        $data = $request->all();
        // dd($data);
        // 画像フォームでリクエストした画像情報を取得
        $img = $request->file('img_path');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');
        // DBに登録する処理
        $question_id = Question::insertGetId([
            'big_question_id' => $id,
            'order' => $order,
            'image' => $path
        ]);

        foreach($data['choices'] as $k => $choice){
        if($k == $data['valid']){
        $valid = 1;
        }else{
        $valid = 0;
        }
        // dd($valid);

        Choice::insertGetId([
            'question_id' => $question_id,
            'name' => $choice,
            'valid' => $valid
        ]);
    }
        return redirect()->route('admin');
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        Choice::where('question_id', $id)->delete();
        Question::where('id', $id)->update(['order' => (int)$data['order']]);
        // dd($data);
        foreach($data['choices'] as $k => $choice){
        if($k == $data['valid']){
        $valid = 1;
        }else{
        $valid = 0;
        }
        // dd($valid);

        Choice::insertGetId([
            'question_id' => $id,
            'name' => $choice,
            'valid' => $valid
        ]);
    }
        return redirect()->route('admin');
    }
    public function delete($id){
        Question::where('id', $id)->delete();
        Choice::where('question_id', $id)->delete();
        return redirect()->route('admin');
    }

    public function edit($id){
        // 該当するIDのメモをデータベースから取得
        $question = Question::where('id', $id)->first();
        // //   ↑firstは一行だけとる
        //   dd($question);
        // //取得したメモをViewに渡す
        // $memos = Memo::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        // $tags = Tag::where('user_id', $user['id'])->get();
        // return view('edit',compact('memo', 'user', 'memos', 'tags'));
        $choices = Question::find($id)->choices;
        // foreach($q['choices'] as $c){
        //     if($c['valid']===1){
        //     $q['answer'] = $c;
        //     
        // }
                //   dd($choices);
        return view('edit', compact('question', 'choices'));
}
}
