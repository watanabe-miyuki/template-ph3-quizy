<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Big_question;


class IndexController extends Controller
{
    public function index()
    {
            $big_questions=Big_question::orderBy('order', 'asc')->get();
            return view('admin.index', compact('big_questions'));
    }
}