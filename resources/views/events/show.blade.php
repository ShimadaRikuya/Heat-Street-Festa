@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">

        <div class="img mx-auto" style="width: 40rem;">
            <img src="{{ asset($event->image_uploader) }}" class="card-img" style="object-fit:cover; height: 500px;">
            <h3><span class="img-badge badge bg-success">{{ $event->category->name }}</span></h3>
        </div>
        <div class="cont_inner w-75 mx-auto">
            <div class="pt-4 section title_area">
                <h1>{{ $event->title }}</h1>
                <p class="sub">{{ $event->venue }}</p>
            </div>

            <div class="section date_area mt-5">
                <span><h5>開催日時</h5></span>
                <div class="date_area_info">
                    <p class="date">{{ $event->event_start }} ~ {{ $event->event_end }}</p>
                    <p class="time">{{ $event->event_time_discription }}</p>
                </div>
            </div>

            <div class="section price_area mt-5">
                <h5>料金</h5>
                <p>{{ $event->fee }}円</p>
            </div>

            <div class="border-bottom my-5"></div>

            <div class="section about_area">
                <h5>概要</h5>
                <p>{{ $event->discription }}</p>
            </div>

            <div class="section venue_area mt-5">
                <h5>会場</h5>
                <p>{{ $event->venue }}</p>
            </div>

            <div class="section sponser_area mt-5">
                <h5>主催者</h5>
                <p>{{ $event->team->name }}</p>
            </div>

            <div class="section contact_area mt-5">
                <h5>お問合わせ</h5>
                <p class="contact_name">{{ $event->team->name }}</p>
                <i class="fa-light fa-lg fa-phone"> {{ $event->team->phone }}</i>
            </div>
            
        </div>

        <div class="likes">
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
            <div class="like-count">
                <p>{{ $event->users()->count() }}</p>
            </div>
        </div>

    </div>
</div>
@endsection