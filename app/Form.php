<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    public function questions() {
        return $this->hasMany('App\Question', 'id_form');
    }
}
