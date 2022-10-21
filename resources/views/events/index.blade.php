@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">
        <h1 class="section_title">全て</h1>

        <div class="m-lg-5">

            @foreach($events as $event)
                <div class="col-4"> 
                    <a href="{{ route('events.show', $event->id) }}" class="thumbnail"><img src="{{ $event->image_uploader }}" class="img-rounded" width="200" height="200"/></a>
                        <div class="card__txt">
                            <p class="card__title">{{ $event->title }}</p>
                            <p class="card__sub">{{ $event->venue }}</p>
                            <p class="card__uploaddate"></p>
                        </div>
                </div>
            @endforeach

        </div>

        {{ $events->links() }}
        

    </div>

</div>
@endsection
