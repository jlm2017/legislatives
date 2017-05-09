@extends('layout')

@section('title')
    Search circonscription
@endsection

@section('data')
    <div class="container">
      <h3 class= "text-center">Recherche des circonscriptions par département</h3>
      <hr />
      {!! Form::open(['url' => 'circonscriptions','class' => 'form-inline row']) !!}
        <div class="col-xs-7 col-xs-offset-1">
          {!! Form::label('dep', 'Choix du département&nbsp;:', ['class' => 'control-label']); !!}
          {!! Form::select('dep', $deps, null, ['class' => 'form-control']); !!}
         </div>
       {!! Form::submit('Rechercher', array('class' => 'btn btn-large btn-primary openbutton col-xs-3')); !!}
      {!! Form::close() !!}
    </div>
@endsection
