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
                Titulaire
            </div>
            <div class="photo">
                @if(file_exists('/photos/'.$circonscription->numDep.'_'.$circonscription->numCirco.'_T.jpeg'))
                    <img src='/photos/{{$circonscription->numDep}}_{{$circonscription->numCirco}}_T.jpeg' alt="">
                @else
                    <img src='/photos/default.jpeg' alt="photoSuppléant">
                @endif
            </div>
            <div class="bio">
                <p>{{$circonscription->bioTitu}}</p>
            </div>
        </div>

        <div class="candidat">
            <div class="nom">
                <h4>{{$circonscription->prenomSupp}} {{$circonscription->nomSupp}}</h4>
                Suppléant
            </div>
            <div class="photo">
                @if(file_exists('/photos/'.$circonscription->numDep.'_'.$circonscription->numCirco.'_S.jpeg'))
                    <img src='/photos/{{$circonscription->numDep}}_{{$circonscription->numCirco}}_S.jpeg' alt="">
                @else
                    <img src='/photos/default.jpeg' alt="photoSuppléant">
                @endif

            </div>
            <div class="bio">
                <p>{{$circonscription->bioSupp}}</p>
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
            max-width: 600px;
        }
        .photo{
            margin: 25px;
        }
        .bio{
            text-align: left;
        }
    </style>
@endsection
