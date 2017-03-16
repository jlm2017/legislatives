@extends('layout')

@section('title')
    Upload circonscription
@endsection

@section('data')
    {!! Form::open(['url' => 'circonscriptions/create', 'files' => true]) !!}
        {!! Form::file('circonscriptions'); !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
    {{ isset($message) ? $message : 'Enter your csv file' }}
    @if(isset($errorImort))
      <ul>
        @foreach ($errorImort as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif
@endsection
