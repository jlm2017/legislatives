<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = [
        'departement',
        'circonscription',
        'titulaire',
        'nom',
        'prenom',
        'nom_usage',
        'prenom_usage',
        'sexe',
        'photo',
        'charte',
        'date_naissance',
        'activite',
        'email',
        'telephone',
        'bio',
        'email_campagne',
        'twitter',
        'facebook',
        'colistier_nom',
        'colistier_prenom',
        'colistier_mail',
        'colistier_telephone',
        'mandataire_nom',
        'mandataire_prenom',
        'mandataire_adresse_ligne1',
        'mandataire_adresse_ligne2',
        'mandataire_adresse_zipcode',
        'mandataire_adresse_ville',
        'mandataire_mail',
        'mandataire_telephone',
    ];
}
