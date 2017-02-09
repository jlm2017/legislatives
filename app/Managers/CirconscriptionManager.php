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
        //

        Excel::load($file)->each(function (Collection $csvLine) {

            $circonscription = Circonscription::updateOrCreate([
                'numDep' => $csvLine->get('numdep'),
                'numCirco' => $csvLine->get('numcirco'),
                'prenomTitu' => $csvLine->get('prenomtitu'),
                'nomTitu' => $csvLine->get('nomtitu'),
                'bioTitu' => $csvLine->get('biotitu'),
                'prenomSupp' => $csvLine->get('prenomsupp'),
                'nomSupp' => $csvLine->get('nomsupp'),
                'bioSupp' => $csvLine->get('biosupp'),
                'facebook' => $csvLine->get('facebook'),
                'twitter' => $csvLine->get('twitter'),
                'email' => $csvLine->get('email'),
                'blog' => $csvLine->get('blog'),
            ]);

            $circonscription->save();
        });
    }

    public static function getAll(){
        return DB::table('circonscriptions')->get();
    }

    public static function getCirco($numDep, $numCirco){
        return DB::table('circonscriptions')->where(['numDep' => $numDep, 'numCirco' => $numCirco])->first();
    }

}
