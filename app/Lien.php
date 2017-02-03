<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    //
    protected $fillable = ['idCandidat', 'label', 'url'];

    public $timestamps = false;
}
