<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\UseFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function choices()
    {
    return $this->hasMany('App\Choice');
}

// protected $guarded = ['id'];

// public static $rules = [
//     'big_question_id' => 'required',
//     'image' => 'image|file',
// ];
// use UseFactory;

// protected $table = 'questions';

// protected $fillable = [
//     'big_question_id',
//     'image',
// ];
}