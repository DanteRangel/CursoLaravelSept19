<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditForm extends Model
{
    protected $fillable = [
        'id_form',
        'id_user',
        'period'
    ];

    public $timestamps = false;

}
