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
                return view('circonscription.create')->withMessage('Problem uploading the file...');
            }
        } else {
            return view('circonscription.create')->withMessage('File is missing !');
        }

        CirconscriptionManager::import($file);
        return view('circonscription.create')->withMessage('success !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dep, $circo
     * @return \Illuminate\Http\Response
     */
    public function show($dep, $circo)
    {
        $circonscription = CirconscriptionManager::getCirco($dep, $circo);
        if(empty($circonscription)){
            return view('circonscription/noExist');
        } else {
            return view('circonscription.show')->withCirconscription($circonscription);
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
