<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\CirconscriptionManager;
use Illuminate\Support\Facades\Storage;

class CirconscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static $depts = array("01"=>"01 - Ain",
                                "02"=>"02 - Aisne",
                                "03"=>"03 - Allier",
                                "04"=>"04 - Alpes de Haute Provence",
                                "05"=>"05 - Hautes Alpes",
                                "06"=>"06 - Alpes Maritimes",
                                "07"=>"07 - Ardèche",
                                "08"=>"08 - Ardennes",
                                "09"=>"09 - Ariège",
                                "10"=>"10 - Aube",
                                "11"=>"11 - Aude",
                                "12"=>"12 - Aveyron",
                                "13"=>"13 - Bouches du Rhône",
                                "14"=>"14 - Calvados",
                                "15"=>"15 - Cantal",
                                "16"=>"16 - Charente",
                                "17"=>"17 - Charente Maritime",
                                "18"=>"18 - Cher",
                                "19"=>"19 - Corrèze",
                                "2A"=>"2A - Corse du Sud",
                                "2B"=>"2B - Haute-Corse",
                                "21"=>"21 - Côte d'Or",
                                "22"=>"22 - Côtes d'Armor",
                                "23"=>"23 - Creuse",
                                "24"=>"24 - Dordogne",
                                "25"=>"25 - Doubs",
                                "26"=>"26 - Drôme",
                                "27"=>"27 - Eure",
                                "28"=>"28 - Eure et Loir",
                                "29"=>"29 - Finistère",
                                "30"=>"30 - Gard",
                                "31"=>"31 - Haute Garonne",
                                "32"=>"32 - Gers",
                                "33"=>"33 - Gironde",
                                "34"=>"34 - Hérault",
                                "35"=>"35 - Ille et Vilaine",
                                "36"=>"36 - Indre",
                                "37"=>"37 - Indre et Loire",
                                "38"=>"38 - Isère",
                                "39"=>"39 - Jura",
                                "40"=>"40 - Landes",
                                "41"=>"41 - Loir et Cher",
                                "42"=>"42 - Loire",
                                "43"=>"43 - Haute Loire",
                                "44"=>"44 - Loire Atlantique",
                                "45"=>"45 - Loiret",
                                "46"=>"46 - Lot",
                                "47"=>"47 - Lot et Garonne",
                                "48"=>"48 - Lozère",
                                "49"=>"49 - Maine et Loire",
                                "50"=>"50 - Manche",
                                "51"=>"51 - Marne",
                                "52"=>"52 - Haute Marne",
                                "53"=>"53 - Mayenne",
                                "54"=>"54 - Meurthe et Moselle",
                                "55"=>"55 - Meuse",
                                "56"=>"56 - Morbihan",
                                "57"=>"57 - Moselle",
                                "58"=>"58 - Nièvre",
                                "59"=>"59 - Nord",
                                "60"=>"60 - Oise",
                                "61"=>"61 - Orne",
                                "62"=>"62 - Pas de Calais",
                                "63"=>"63 - Puy de Dôme",
                                "64"=>"64 - Pyrénées Atlantiques",
                                "65"=>"65 - Hautes Pyrénées",
                                "66"=>"66 - Pyrénées Orientales",
                                "67"=>"67 - Bas Rhin",
                                "68"=>"68 - Haut Rhin",
                                "69"=>"69 - Rhône",
                                "70"=>"70 - Haute Saône",
                                "71"=>"71 - Saône et Loire",
                                "72"=>"72 - Sarthe",
                                "73"=>"73 - Savoie",
                                "74"=>"74 - Haute Savoie",
                                "75"=>"75 - Paris",
                                "76"=>"76 - Seine Maritime",
                                "77"=>"77 - Seine et Marne",
                                "78"=>"78 - Yvelines",
                                "79"=>"79 - Deux Sèvres",
                                "80"=>"80 - Somme",
                                "81"=>"81 - Tarn",
                                "82"=>"82 - Tarn et Garonne",
                                "83"=>"83 - Var",
                                "84"=>"84 - Vaucluse",
                                "85"=>"85 - Vendée",
                                "86"=>"86 - Vienne",
                                "87"=>"87 - Haute Vienne",
                                "88"=>"88 - Vosges",
                                "89"=>"89 - Yonne",
                                "90"=>"90 - Territoire de Belfort",
                                "91"=>"91 - Essonne",
                                "92"=>"92 - Hauts de Seine",
                                "93"=>"93 - Seine Saint Denis",
                                "94"=>"94 - Val de Marne",
                                "95"=>"95 - Val d'Oise",
                                "971"=>"971 - Guadeloupe",
                                "972"=>"972 - Martinique",
                                "973"=>"973 - Guyane",
                                "974"=>"974 - Réunion",
                                "975"=>"975 - Saint Pierre et Miquelon",
                                "976"=>"976 - Mayotte",
                                "988"=>"988 - Nouvelle-Calédonie",
                                "987"=>"987 - Polynésie-Française",
                                "FE" => "FE - Circonscriptions des Francais de l'étranger");

    public static $enumCirconscription = array( '1' => 'première',
                                                '2' => 'deuxième',
                                                '3' => 'troisième',
                                                '4' => 'quatrième',
                                                '5' => 'cinquième',
                                                '6' => 'sixième',
                                                '7' => 'septième',
                                                '8' => 'huitième',
                                                '9' => 'neuvième',
                                                '10' => 'dixième',
                                                '11' => 'onzeième',
                                                '12' => 'douzième',
                                                '13' => 'treizième',
                                                '14' => 'quatorzième',
                                                '15' => 'quizième',
                                                '16' => 'seizième',
                                                '17' => 'dix-septième',
                                                '18' => 'dix-huitième',
                                                '19' => 'dix-neuvième',
                                                '20' => 'vingtième',
                                                '21' => 'vingt-et-unième');

    public function map()
    {
        return view('circonscription.map');
    }

    public function formationLegislative()
    {
        return view('formationLegislative');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('circonscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('circonscriptions')){
            if ($request->file('circonscriptions')->isValid()){
                $file = $request->file('circonscriptions');
            } else {
                return view('circonscription.create')->withMessage('Un problème et survenu pendant l\'upload du fichier...');
            }
        } else {
            return view('circonscription.create')->withMessage('Le fichier est manquant !');
        }
        $errors = CirconscriptionManager::import($file);
        if (count($errors) > 0) {
          return view('circonscription.create')->with(['errorImort' => $errors]);
        }
        // print_r($msg_error);
        return view('circonscription.create')->withMessage('Le fichier a bien été importé !');

    }

    public function search()
    {
        return view('circonscription.search')->with(['deps' => CirconscriptionController::$depts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->has('dep')){
            $dep = $request->dep;
            $circonscriptions = CirconscriptionManager::getCircos($dep);
        } else {
            return view('circonscription.search')->withMessage('Veuillez sélectionner un numéro de département');
        }

        return view('circonscription.list')->with(['deps' => CirconscriptionController::$depts, 'numDep' => $dep, 'dep' => CirconscriptionController::$depts[$dep], 'circonscriptions' => $circonscriptions]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dep, $circo
     * @return \Illuminate\Http\Response
     */
    public function show($dep, $circo)
    {
        // Get circonscription from DB
        $circonscription = CirconscriptionManager::getCirco($dep, $circo);
        $nomDep = CirconscriptionController::$depts[$dep];
        $ordinal = CirconscriptionController::$enumCirconscription[$circo];

        // If circonscription empty return don't exit view
        // Else check the circonscription state
        if(empty($circonscription)){
            return view('circonscription/noExist')->withMessage("Cette circonscription n'existe pas ou n'a pas encore été mise à jour.");
        } else {
            if ($circonscription->titulaire_nom === "noexist") {
                return view('circonscription/noExist')->withMessage($circonscription->titulaire_bio);
            } else {
                // send circo coords to zoom on the map
                $json = json_decode(file_get_contents(storage_path() . "/minmaxCoordsCirco.json"), true);
                $photos = 'photos/published/'.$circonscription->departement.'_'.$circonscription->numero;
                $photo_titulaire = Storage::disk('public')->exists($photos.'_titulaire.jpg') ?
                    '/storage/'.$photos.'_titulaire.jpg' : false;
                $photo_suppleant = Storage::disk('public')->exists($photos.'_suppleant.jpg') ?
                    '/storage/'.$photos.'_titulaire.jpg' : false;

                return view('circonscription.show')->with([
                    'ordinal' => $ordinal,
                    'nomDep' => $nomDep,
                    'circonscription' => $circonscription,
                    'coords' => $json[$dep][$circo],
                    'photo_titulaire' => $photo_titulaire,
                    'photo_suppleant' => $photo_suppleant
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
