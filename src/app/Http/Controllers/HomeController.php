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
    public function admin()
    {
        $big_questions=Big_question::orderBy('order', 'asc')->get();
        return view('admin.index', compact('big_questions'));
    }

    public function home()
    {
        return view('welcome');
    }
    public function index()
    {
        $big_questions = Big_question::orderBy('order', 'asc')->get();
        return view('index', compact('big_questions'));
    }
    public function quiz($id)
    {
        $questions = Big_question::find($id)->questions;
        $count = count($questions);
        foreach ($questions as $q) {
            $q['choices'] = Question::find($q['id'])->choices;
            foreach ($q['choices'] as $c) {
                if ($c['valid'] === 1) {
                    $q['answer'] = $c;
                }
            }
        }
        return view('quiz', compact('questions', 'count'));
    }

    public function big_store(Request $request)
    {
        Big_question::insertGetId([
            'order' => $request['order'],
            'name' => $request['name']
        ]);
        return redirect()->route('admin');
    }

    public function big_update(Request $request, $id)
    {
        if ($request->has('delete')) {
            Big_question::where('id', $id)->delete();
        } else {
            $data = $request->all();
            Big_question::where('id', $id)->update([
                'order' => (int)$data['order'],
                'name' => $data['name']
            ]);
        }
        return redirect()->route('admin');
    }

    public function big_edit()
    {
        $big_questions = Big_question::orderBy('order', 'asc')->get();
        return view('big_edit', compact('big_questions'));
    }

    public function q_edit($id)
    {
        $big_questions = Big_question::where('id', $id)->first();
        $questions = Big_question::find($id)->questions;
        foreach ($questions as $q) {
            $q['choices'] = Question::find($q['id'])->choices;
        }

        return view('q_edit', compact('id', 'big_questions', 'questions'));
    }

    public function q_update(Request $request, $id)
    {
        if ($request->has('delete')) {
            Question::where('id', $id)->delete();
        } else {
            $data = $request->all();
            Choice::where('question_id', $id)->delete();
            Question::where('id', $id)->update(['order' => (int)$data['order']]);
            foreach ($data['choices'] as $k => $choice) {
                if ($k == $data['valid']) {
                    $valid = 1;
                } else {
                    $valid = 0;
                }

                Choice::insertGetId([
                    'question_id' => $id,
                    'name' => $choice,
                    'valid' => $valid
                ]);
            }
        }

        return redirect()->route('q_edit', ['id' => $id]);
    }

        public function q_store(Request $request, $id)
        {
            $data = $request->all();
            $img = $request->file('img_path');
            $path = $img->store('img', 'public');
            $question_id = Question::insertGetId([
                'big_question_id' => $id,
                'order' => $data['order'],
                'image' => $path
            ]);
    
            foreach ($data['choices'] as $k => $choice) {
                if ($k == $data['valid']) {
                    $valid = 1;
                } else {
                    $valid = 0;
                }

                Choice::insertGetId([
                    'question_id' => $question_id,
                    'name' => $choice,
                    'valid' => $valid
                ]);
            }
            return redirect()->route('q_edit', ['id' => $id]);
        }
}
