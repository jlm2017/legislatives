<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circonscription extends Model
{
    //
    protected $fillable = ['numDep', 'numCirco', 'titulaire', 'suppleant'];

    public $timestamps = false;
}
