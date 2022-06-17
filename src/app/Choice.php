<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //
    protected $guarded = ['id'];

    public static $rules = [
        'question_id' => 'required',
        'name' => 'required',
        'valid' => 'required',
    ];
}
