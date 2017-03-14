@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')
    <div class="container">
      <div class="row">
        <h3 class= "text-center">Recherche des circonscriptions par département</h3>
        <hr />
        {!! Form::open(['url' => 'circonscriptions','class' => 'form-inline row']) !!}
            <div class="col-xs-7 col-xs-offset-1">
              {!! Form::label('dep', 'Choix du département&nbsp;:', ['class' => 'control-label']); !!}
              {!! Form::select('dep', $deps, $numDep, ['class' => 'form-control']); !!}
            </div>
            {!! Form::submit('Rechercher !', array('class' => 'btn btn-large btn-primary openbutton col-xs-3')); !!}
        {!! Form::close() !!}
      </div>
      <hr>
      <h3>{{$dep}} - Liste des circonscriptions</h3>
      <hr>
      @foreach ($circonscriptions as $circo)

        <h4>{{$dep}} - Circonscription n°{{$circo->numCirco}}</h4>
        <div class="row">
          @if($circo->nomTitu != 'noexist')
            <div class="col-sm-4 col-xs-12">
              <strong>Titulaire&nbsp;: </strong>{{ucfirst(trans($circo->prenomTitu)).' '.strtoupper($circo->nomTitu) }}
            </div>
            <div class="col-sm-4 col-xs-12">
              <strong>Suppléant&nbsp;: </strong>{{ucfirst(trans($circo->prenomSupp)).' '.strtoupper($circo->nomSupp) }}
            </div>
            <a href="/departement/{{$numDep}}/circonscription/{{$circo->numCirco}}" target="_blank" class="btn btn-sm btn-primary col-sm-3 col-sm-ofsset-1 col-xs-6">En voir plus</a>
          @else
            <p class="col-xs-12">{{$circo->bioTitu}}</p>
          @endif
        </div>
        @if($circonscriptions->last()->numCirco != $circo->numCirco) <hr /> @endif
      @endforeach
    </div>
@endsection
