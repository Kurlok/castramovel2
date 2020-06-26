<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    protected $table = 'proprietarios';

    public function animais()
    {
        return $this->hasMany('App\Animal');
    }
}
