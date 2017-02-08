<?php

namespace App\Managers;

use Illuminate\Support\Collection;
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
    public function import($file)
    {
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

}
