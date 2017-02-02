<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    //
    protected $fillable = ['nom', 'prenom', 'bio', 'photo'];

    public $timestamps = false;
}
