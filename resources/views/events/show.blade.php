@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">

        <div class="img mx-auto text-center" style="width: 40rem;">
            <img src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" class="img-fluid">
                @if ($event->event_start <= now())
                    <h3><span class="img-badge badge bg-success">イベント・開催中</span></h3>
                @else
                    <h3><span class="img-badge badge bg-success">イベント・開催前</span></h3>
                @endif
        </div>
        <div class="cont_inner w-75 mx-auto">
            <div class="pt-4 section title_area">
                <h1>{{ $event->title }}</h1>
                <p class="sub">{{ $event->category->name }} / {{ $event->address1 }}</p>
            </div>

            <div class="section date_area mt-5">
                <span><p class="fw-bold">開催日時</p></span>
                <div class="date_area_info">
                    <p class="date">{{ $event->event_start }} ~ {{ $event->event_end }}</p>
                    <p class="time">{{ $event->event_time_discription }}</p>
                </div>
            </div>

            @if (isset($event->fee))
                <div class="section price_area mt-5">
                    <p class="fw-bold">料金</p>
                    <p>{{ $event->fee }}円</p>
                    <p>{{ $event->event_time_discription }}</p>
                </div>
            @endif
            

            <div class="border-bottom my-5"></div>

            <div class="section about_area">
                <p class="fw-bold">概要</p>
                <p>{{ $event->discription }}</p>
            </div>

            <div class="section venue_area mt-5">
                <p class="fw-bold">会場</p>
                <p>{{ $event->venue }}</p>
            </div>

            <div class="section sponser_area mt-5">
                <p class="fw-bold">主催者</p>
                <p>{{ $event->team->name }}</p>
            </div>

            <div class="section contact_area mt-5">
                <p class="fw-bold">お問合わせ</p>
                <p class="contact_name">{{ $event->team->name }}</p>
                <p><i class="fa-light fa-lg fa-phone"></i> {{ $event->team->phone }}</p>
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