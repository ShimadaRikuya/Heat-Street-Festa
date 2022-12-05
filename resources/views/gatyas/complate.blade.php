@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <div class="section ticket_get box">
            <div class="create_cont">
                <div class="create_cont-inner">
                    <div class="mb-5 text-center">
                        <h1>ご利用ありがとうございます！</h1>
                        <h1><div class="text-success my-5">{{ $dates->name }}</div>を獲得しました！</h1>
                    </div>

                    <div class="d-grid gap-3 col-6 mx-auto">
                        <a class="btn btn-success btn-lg" href="{{ url('/') }}" role="button">TOPへ</a>
                        <a class="btn btn-success btn-lg" href="{{ route('user.edit', Auth::user()->id) }}" role="button">チケット一覧へ</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection