<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id_input',
        'name',
        'id_type_input',
        'id_form'
    ];

    public function input() {
        return $this->belongsTo('App\Input', 'id_input');
    }
    
    public function type_input() {
        return $this->belongsTo('App\TypeInput', 'id_type_input');
    }
    
    public function form() {
        return $this->belongsTo('App\Form', 'id_form');
    }

    public function options() {
        return $this->hasMany('App\Option', 'id_question');
    }
}
