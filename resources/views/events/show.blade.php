@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row w-75 mx-auto text-center">
        <div class="section_title">詳細</div>

        <div class="mx-auto" style="width: 30rem;">
            <img src="{{ asset($events->image_uploader) }}" class="card-img-top" style="object-fit:cover;">
        </div>
        <div class="section title_area">
            <h1>{{ $events->title }}</h1>
            <p class="sub">{{ $events->venue }}</p>
            <p>{{ $events->category->name }}</p>
        </div>
        <div class="section date_area">
            <h4>開催日時</h4>
            <div class="date_area_info">
                <p class="date">{{ $events->event_start }} ~ {{ $events->event_end }}</p>
                <p class="time">{{ $events->event_time_discription }}</p>
            </div>
        </div>
        <div class="section price_area">
            <h4>料金</h4>
            <p>{{ $events->fee }}</p>
        </div>
        <div class="section about_area">
            <h4>概要</h4>
            <div>{{ $events->discription }}</div>
            <a class="web" href="{{ $events->official_url }}" target="_blank">公式サイト</a>
        </div>
        <div class="section venue_area">
            <h4>会場</h4>
            <p>{{ $events->venue }}</p>
        </div>
    </div>
</div>
@endsection