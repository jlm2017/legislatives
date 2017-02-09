@extends('circonscription/layout')

@section('title')
    Upload circonscription
@endsection

@section('data')
    {!! Form::open(['url' => 'circonscription', 'files' => true]) !!}
        {!! Form::file('circonscriptions'); !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
    {{ isset($message) ? $message : 'Enter your csv file' }}
@endsection
