<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //
    // public function questions()
    // {
    //     return $this->belongsTo('App\Question');
    // }

    protected $guarded = ['id'];

    public static $rules = [
        'question_id' => 'required',
        'name' => 'required',
        'valid' => 'required',
    ];
}
