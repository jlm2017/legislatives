@extends('layout')

@section('title')
    Search circonscription
@endsection

@section('data')
    {!! Form::open(['url' => 'circonscriptions']) !!}
        <!-- {!! Form::selectRange('number', 10, 20); !!} -->
        {!! Form::select('dep', $deps); !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
    {{ isset($message) ? $message : 'Enter the departement\'s number you\'re looking for' }}
@endsection
