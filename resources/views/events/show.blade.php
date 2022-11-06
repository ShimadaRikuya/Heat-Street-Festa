@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row w-75 mx-auto text-center">
        <div class="section_title">詳細</div>

        <div class="mx-auto" style="width: 30rem;">
            <img src="{{ asset($event->image_uploader) }}" class="card-img-top" style="object-fit:cover;">
        </div>
        <div class="section title_area">
            <h1>{{ $event->title }}</h1>
            <p class="sub">{{ $event->venue }}</p>
            <p>{{ $event->category->name }}</p>
        </div>
        <div class="section date_area">
            <h4>開催日時</h4>
            <div class="date_area_info">
                <p class="date">{{ $event->event_start }} ~ {{ $event->event_end }}</p>
                <p class="time">{{ $event->event_time_discription }}</p>
            </div>
        </div>
        <div class="section price_area">
            <h4>料金</h4>
            <p>{{ $event->fee }}</p>
        </div>
        <div class="section about_area">
            <h4>概要</h4>
            <div>{{ $event->discription }}</div>
            <a class="web" href="{{ $event->official_url }}" target="_blank">公式サイト</a>
        </div>
        <div class="section venue_area">
            <h4>会場</h4>
            <p>{{ $event->venue }}</p>
        </div>
        @if($event->users()->where('user_id', Auth::id())->doesntExist())
            <div class="like"> 
                <form action="{{ route('like', $event) }}" method="POST">
                  @csrf
                  <input type="submit" value="&#xf004;" class="fas btn">
                </form>
            </div>
        @else
            <div class="unlike">
                <form action="{{ route('unlike', $event) }}" method="POST">
                  @csrf
                  <input type="submit" value="&#xf004;" class="fas fa-solid" style="border: none; background: transparent;">
                </form>
            </div>
        @endif
        <div class="row justify-content-center">
            <p>いいね数：{{ $event->users()->count() }}</p>
        </div>
    </div>
</div>
@endsection