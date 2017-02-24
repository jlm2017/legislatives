<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\CirconscriptionManager;

class CirconscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        return view('circonscription.map');
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

        CirconscriptionManager::import($file);
        return view('circonscription.create')->withMessage('Le fichier a bien été importé !');

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

        // If circonscription empty return don't exit view
        // Else check the circonscription state
        if(empty($circonscription)){
            return view('circonscription/noExist')->withMessage("Cette circonscription n'existe pas ou n'a pas encore été mise à jour.");
        } else {
            if ($circonscription->nomTitu === "not") {
                return view('circonscription/noExist')->withMessage($circonscription->bioTitu);
            } else {
                // send circo coords to zoom on the map
                $json = json_decode(file_get_contents(storage_path() . "/minmaxCoordsCirco.json"), true);
                return view('circonscription.show')->with(['circonscription' => $circonscription, 'coords' => $json[$dep][$circo]]);
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
