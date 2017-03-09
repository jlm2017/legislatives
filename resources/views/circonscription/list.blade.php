@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')
    <div class="text-center">
        <h3>Liste des circonscriptions - {{$dep}}</h3>
        <hr>
        @foreach ($circonscriptions as $circo)
          <a href="/departement/{{$numDep}}/circonscription/{{$circo->numCirco}}" target="_blank"> {{$circo->numCirco}}@if ($circo->numCirco == 1) <sup>ère</sup> @else <sup>ème</sup> @endif circonscription</a>
          <br>
        @endforeach
    </div>
@endsection
