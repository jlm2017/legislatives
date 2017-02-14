@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')
    <div class="circonscription">
        <h3>Département {{$circonscription->numDep}} circonscription n°{{$circonscription->numCirco}}</h3>
    </div>
    <hr />
    <div class="candidats text-center">
        <div class="candidat">
            <div class="nom">
                <h4>{{$circonscription->prenomTitu}} {{$circonscription->nomTitu}}</h4>
            </div>
            <div class="photo">
                <img src="http://lorempixel.com/400/200" alt="photoTitulaire">
            </div>
            <div class="bio">
                {{$circonscription->bioTitu}}
            </div>
        </div>

        <div class="candidat">
            <div class="nom">
                <h4>{{$circonscription->prenomSupp}} {{$circonscription->nomSupp}}</h4>
            </div>
            <div class="photo">
                <img src="http://lorempixel.com/400/200" alt="photoSuppléant">
            </div>
            <div class="bio">
                {{$circonscription->bioSupp}}
            </div>
        </div>
    </div>
    <hr />
    <div class="liens text-center">
        <div class="row">
            <div class="col-xs-6">
                <a class="btn btn-lg" href="{{$circonscription->facebook}}">Facebook</a>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-lg" href="{{$circonscription->blog}}">Site Web</a>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-lg" href="{{$circonscription->twitter}}">Twitter</a>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-lg" href="mailto:{{$circonscription->email}}">Contact email</a>
            </div>
        </div>
    </div>

    <style media="screen">
        .lien{
            list-style-type: none;
        }
        .circonscription{
            display: block;
            text-align: center;
            margin: auto;
        }
        .candidats{
            display: block;
            margin: auto;
        }
        .candidat{
            display: inline-block;
            margin: auto;
            width: 500px;
        }
        .photo{
            margin: 25px;
        }
        .bio{
            width: 500px;
        }
    </style>
@endsection
