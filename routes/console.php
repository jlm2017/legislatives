<?php

use Illuminate\Foundation\Inspiring;

use App\Circonscription;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('getCircoRoad {fileName=circoRoad.csv}', function ($fileName) {
    $circos = Circonscription::all();
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . $fileName, "wb");
    fwrite($fp,"numDep;numCirco;titulaire/suppléant;nom;prenom;token\n");
    foreach ($circos as $circo) {
      fputcsv($fp, [$circo->departement, $circo->numero, "t", $circo->titulaire_nom, $circo->titulaire_prenom, encrypt($circo->departement . "-" . $circo->numero . "-t")], ";");
      fputcsv($fp, [$circo->departement, $circo->numero, "s", $circo->suppleant_nom, $circo->suppleant_prenom, encrypt($circo->departement . "-" . $circo->numero . "-s")], ";");
    }
    fclose($fp);
})->describe('Generate csv file to get encrypted url for each candidate');
