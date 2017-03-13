@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')
    <div class="container">
        <h1>Liste des circonscriptions - {{$dep}}</h1>
        <hr>
        @foreach ($circonscriptions as $circo)
          <h4>Circonscription n°{{$circo->numCirco}} - {{$dep}}</h4>
          <div class="row">
            <div class="col-sm-4 col-xs-12">
              <strong>Titulaire&nbsp;: </strong>{{ucfirst(trans($circo->prenomTitu))}} {{strtoupper($circo->nomTitu)}}
            </div>
            <div class="col-sm-4 col-xs-12">
              <strong>Suppléant&nbsp;: </strong>{{ucfirst(trans($circo->prenomSupp))}} {{strtoupper($circo->nomSupp)}}
            </div>
            <a href="/departement/{{$numDep}}/circonscription/{{$circo->numCirco}}" target="_blank" class="btn btn-sm btn-primary col-sm-3 col-sm-ofsset-1 col-xs-6">En voir plus</a>
          </div>
          @if($circonscriptions->last()->numCirco != $circo->numCirco) <hr /> @endif
        @endforeach
    </div>
@endsection
