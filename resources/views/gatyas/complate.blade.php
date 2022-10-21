@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <h1>おめでとうございます！</h1>
    <p>{{ $dates->name }}を受け取りました！</p>

    <a href="{{ url('/') }}">TOPへ</a>
@endsection