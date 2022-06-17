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
    // public function big_questions()
    // {
    //     return $this->belongsTo('App\Big_question');
    // }
// public static function boot()
// {
//     parent::boot();
//     static::deleted(function ($question) {
//         $question->choices()->delete();
//     });
// }
// }
// protected static function boot() 
// {
//     parent::boot();
//     static::deleting(function($model) {
//         foreach ($model->choices()->get() as $choice) {
//             $choice->delete();
//         }
//     });
// }

}