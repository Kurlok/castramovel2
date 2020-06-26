<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    protected $table = 'residencias';

    public function animais()
    {
        return $this->hasMany('App\Animal', 'animal_id', 'id');
    }

}
