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

public static function boot()
{
    parent::boot();

    static::deleting(function ($question) {
        $question->choices()->delete();
    });
}
}
