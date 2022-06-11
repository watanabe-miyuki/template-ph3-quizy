<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Big_question extends Model
{
    //
    public function questions()
    {
    return $this->hasMany('App\Question');
    
}
}
