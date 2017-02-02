<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('welcome');
    }

    public function departement($dep){
        return $dep;
    }

    public function circonscription(){
        return view('');
    }

    public function edit(){
        $this->middleware('auth');
        return view('');
    }
}
