<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //

    public function questions() {
        return $this->hasMany('App\Question', 'id_form');
    }
}
