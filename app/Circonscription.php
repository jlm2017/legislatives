<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circonscription extends Model
{
    //
    protected $fillable = ['numDep', 'numCirco', 'nomTitu', 'prenomTitu', 'bioTitu', 'nomSupp', 'prenomSupp', 'bioSupp', 'facebook', 'twitter', 'email', 'blog'];

    public $timestamps = false;
}
