<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    //
    protected $fillable = ['idCandidat', 'nom', 'url'];

    public $timestamps = false;
}
