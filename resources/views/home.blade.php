@extends('layouts.app') {{--specifies which layout child view should inherit--}}
@section('content') {{--defines section of content--}}

<h1>Home : {{ Auth::user()->name }}</h1> {{--using Auth facade to fetch user detail--}}

@endsection