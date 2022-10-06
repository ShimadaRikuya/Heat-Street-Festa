@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>主催者</h1>
        <select name="team">
            @foreach ($teams as $team)
                <option name="name" value="{{ $team->name }}">{{ $team->name }}</option>
            @endforeach
        </select>
    </div>
</div>
@endsection