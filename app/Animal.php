<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animais';

    public function residencia()
    {
        return $this->belongsTo('App\Residencia');
    }

    public function proprietario()
    {
        return $this->belongsTo('App\Proprietario');
    }
}
