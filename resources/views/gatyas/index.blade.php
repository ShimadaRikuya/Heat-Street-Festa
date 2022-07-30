@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <h1>チケット</h1>
    <p>イベントで使用できる特典</p>
    
    
    <form action="{{ url('gatyas/complate')}}" method="POST">
    @csrf
        <input type="submit" name="btn" value="特典チケットを引く">
    </form>
@endsection