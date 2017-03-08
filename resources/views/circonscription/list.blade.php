@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')
    <div class="">
        <h3>Département {{$dep}}</h3>
    </div>

    @foreach ($circonscriptions as $circo)
      <a href="/departement/{{$dep}}/circonscription/{{$circo->numCirco}}" target="_blank">circonscription n°{{$circo->numCirco}}</a>
      <br>
    @endforeach
@endsection
