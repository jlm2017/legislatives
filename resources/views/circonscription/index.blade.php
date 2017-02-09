@extends('circonscription/layout')

@section('title')
    Les circonscriptions
@endsection

@section('data')
    {{ var_dump($circonscriptions) }}
@endsection
