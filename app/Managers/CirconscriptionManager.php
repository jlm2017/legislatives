<?php

namespace App\Managers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Circonscription;

class CirconscriptionManager
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function import($file){
        $errors = [];
        Excel::load($file)->each(function (Collection $csvLine, $nbline) use (&$errors) {
            if ($csvLine->get('departement') == NULL|| $csvLine->get('circo') == NULL) {
                array_push($errors, 'erreur sur la ligne n°'.($nbline + 2).' :'.$csvLine);

                return false;
            }

            if ($csvLine->get('titulaire_nom') == NULL) {
                array_push($errors, 'ligne n°'.($nbline + 2).' vide');

                return false;
            }

            $circonscription = Circonscription::updateOrCreate([
                'departement' => $csvLine->get('departement'),
                'numero' => $csvLine->get('circo'),
            ],

            [
                'departement' => $csvLine->get('departement'),
                'numero' => $csvLine->get('circo'),
                'titulaire_prenom' => $csvLine->get('titulaire_prenom'),
                'titulaire_nom' => $csvLine->get('titulaire_nom'),
                'titulaire_bio' => $csvLine->get('titulaire_bio'),
                'suppleant_prenom' => $csvLine->get('suppleant_prenom'),
                'suppleant_nom' => $csvLine->get('suppleant_nom'),
                'suppleant_bio' => $csvLine->get('suppleant_bio'),
                'facebook' => $csvLine->get('facebook'),
                'twitter' => $csvLine->get('twitter'),
                'email_campagne' => $csvLine->get('email_campagne'),
                'blog' => $csvLine->get('blog'),
            ]);
        });

        return ($errors);
    }

    public static function getAll(){
        return DB::table('circonscriptions')->get();
    }

    public static function getAllDep(){
        return DB::table('circonscriptions')->pluck('departement');
    }

    public static function getCirco($departement, $numero){
        return DB::table('circonscriptions')->where(['departement' => $departement, 'numero' => $numero])->first();
    }

    public static function getCircos($departement){
        return DB::table('circonscriptions')->where('departement', $departement)->get();
    }
}
