<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    //
    protected $fillable = [ 'name' ];

    public function questions(){
        $this->hasMany('App\Question', 'id_input');
    }
}
