<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circonscription extends Model
{
    //
    protected $fillable = [
        'departement',
        'circo',
        'titulaire_prenom',
        'titulaire_nom',
        'titulaire_bio',
        'suppleant_prenom',
        'suppleant_nom',
        'suppleant_bio',
        'facebook',
        'twitter',
        'email',
        'blog'
    ];

    /**
     * The model needs not to be timestamped by Eloquent
     *
     * @var boolean
     */
    public $timestamps = false;
}
