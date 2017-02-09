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
    public function index()
    {
        //
        $circonscriptions = CirconscriptionManager::getAll();
        return view('circonscription.index')->withCirconscriptions($circonscriptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dep, $circo)
    {
        //
        $circonscription = CirconscriptionManager::getCirco($dep, $circo);
        if($circonscription!=NULL){
            return view('circonscription.show')->withCirconscription($circonscription);
        } else {
            return view('circonscription/noExist');
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
