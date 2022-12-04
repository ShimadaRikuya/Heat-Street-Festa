@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="box">
            <div class="title border rounded-pill"><h4 class="title-inner">新規作成</h4></div>

            <section class="create_cont">
                <div class="create_cont-inner">
                        <!-- 画像 --->
                        <div class="section article_hero">
                            <div class="image text-center">
                                <img src="{{ Storage::disk('s3')->url("events/$fileName") }}" class="img-fluid" alt="画像">
                            </div>
                        </div>
                    
                        <!-- タイトル --->
                        <div class="section title_area my-4">
                            <h1>{{ $title }}</h1>
                            <p>{{ $categories->name }} / {{ $address1 }}</p>
                        </div>
                    
                        <!-- 開催日時 --->
                        <div class="section data_area mt-5">
                            <h5 class="fw-bold mb-3">開催日時</h5>
                            <div class="data_area_info">
                                <p class="data">{{ $event_start }} 〜 {{ $event_end }}</p>
                            </div>
                            @if ($event_time_discription)
                                <p>{{ $event_time_discription }}</p>
                            @endif
                        </div>
                    
                        <!-- 料金 --->
                        @if ($fee)
                            <div class="section price_area mt-5">
                                <h5 class="fw-bold mb-3">料金</h5>
                                <p>{{ $fee }}</p>
                            </div>
                        @endif

                        <div class="border-bottom my-5"></div>
                    
                        <!-- 概要 --->
                        <div class="section discription_area mt-5">
                            <h5 class="fw-bold mb-3">概要</h5>
                            <p>{{ $discription }}</p>
                            @if ($official_url)
                                <a class="text-decoration-none" href="{{ $official_url }}"><i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i> 公式サイト</a>
                            @endif
                        </div>
                    
                        <!-- 会場 --->
                        <div class="section venue_area mt-5">
                            <h5 class="fw-bold mb-3">会場</h5>
                            <p class="sub">{{ $venue }}</p>
                            <p>{{ $address1 }}{{ $address2 }}</p>
                        </div>
                    
                        <!-- 主催者 --->
                        <div class="section sponsor_area mt-5">
                            <h5 class="fw-bold mb-3">主催者</h5>
                                <p>{{ $teams->name }}</p>
                        </div>

                        <!-- 問い合わせ先 -->
                        <div class="section sponsor_area mt-5">
                            <h5 class="fw-bold mb-3">問い合わせ</h5>
                                <p>{{ $teams->name }}</p>
                                <p><i class="fa-solid fa-envelope fa-lg"></i> {{ $teams->email }}</p>
                                <p><i class="fa-light fa-lg fa-phone"></i> {{ $teams->phone }}</p>
                        </div>
                    
                    <div class="preview_btn_area">
                        <div class="preview_btn_area-inner">
                            <input type="button"class="btn btn-outline-secondary" value="修正" onClick="history.back()">
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-success">作成を完了する</button>
                                @csrf
                                <input type="hidden" name="form_public" value="{{ $form_public }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="team_id" value="{{ $teams->id }}">
                                <input type="hidden" class="form-control" value="{{ $fileName }}" name="image_uploader" multiple>
                                <input type="hidden" name="title" value="{{ $title }}">
                                <input type="hidden" name="category_id" value="{{ $category_id }}">
                                <input type="hidden" name="event_start" value="{{ $event_start }}">
                                <input type="hidden" name="event_end" value="{{ $event_end }}">
                                <input type="hidden" name="event_time_discription" value="{{ $event_time_discription }}">
                                <input type="hidden" name="fee" value="{{ $fee }}">
                                <input type="hidden" name="discription" value="{{ $discription }}">
                                <input type="hidden" name="official_url" value="{{ $official_url }}">
                                <input type="hidden" name="venue" value="{{ $venue }}">
                                <input type="hidden" name="zip" value="{{ $zip }}">
                                <input type="hidden" name="address1" value="{{ $address1 }}">
                                <input type="hidden" name="address2" value="{{ $address2 }}">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection