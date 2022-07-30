@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <h1>おめでとうございます！</h1>
    <p>このチケットがあたりました</p>

    <a href="{{ url('/') }}">戻る</a>
@endsection