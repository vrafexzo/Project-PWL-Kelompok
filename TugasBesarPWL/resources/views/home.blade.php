@extends('layouts.main')

@section('container')
    @auth
    <h1>HALO {{ auth()->user()->name }} di aplikasi {{ config('app.name') }}</h1>
    @endauth
@endsection