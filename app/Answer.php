<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'id_user',
        'id_period',
        'id_question',
        'answer'
    ];

    public function question(){
        return $this->belongsTo('App\Question', 'id_question', 'id');
    }
}
