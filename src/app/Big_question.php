<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Big_question extends Model
{
    //
    public function questions()
    {
        return $this->hasMany('App\Question')->orderBy('order', 'asc');;
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function ($model) {
    //         foreach ($model->questions()->get() as $question) {
    //             $question->delete();
    //         }
    //     });
    // }
}
