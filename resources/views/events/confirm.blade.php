@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <h3>登録確認画面</h3>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="form_public" value="{{ $form_public }}">
        
        <div class="mb-3">
        <label for="event_title" class="form-label">タイトル名</label>
        <input type="hidden" name="title" value="{{ $title }}">
        <div class="">{{ $title }}</div>
        </div>

        <div class="mb-3">
        <label for="event_discription" class="form-label">イベント概要</label>
        <input type="hidden" name="discription" value="{{ $discription }}">
        <div class="">{{ $discription }}</div>
        </div>

        <div class="image">
            <p>画像</p>
            <input type="hidden" class="form-control" value="{{ $img_path }}" name="image_uploader" multiple>
            <img src="{{ asset($img_path) }}" alt="画像">
        </div>

        <div class="mb-3">
            <label for="event_start" class="form-label">開始日</label>
            <input type="hidden" name="event_start" value="{{ $event_start }}">
            <div class="">{{ $event_start }}</div>
        </div>

        <div class="mb-3">
            <label for="event_end" class="form-label">終了日</label>
            <input type="hidden" name="event_end" value="{{ $event_end }}">
            <div class="">{{ $event_end }}</div>
        </div>

        <div class="mb-3">
            <label for="event_time_discription" class="form-label">開催日時の詳細</label>
            <input type="hidden" name="event_time_discription" value="{{ $event_time_discription }}">
            <div class="">{{ $event_time_discription }}</div>
        </div>

        <div class="mb-3">
            <label for="event_fee" class="form-label">料金</label>
            <input type="hidden" name="fee" value="{{ $fee }}">
            <div class="">{{ $fee }}</div>
        </div>

        <div class="mb-3">
            <label for="official_url" class="form-label">公式サイトURL</label>
            <input type="hidden" name="official_url" value="{{ $official_url }}">
            <div class="">{{ $official_url }}</div>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">会場名</label>
            <input type="hidden" name="venue" value="{{ $venue }}">
            <div class="">{{ $venue }}</div>
        </div>

        <div class="mb-3">
            <label for="zip1_zip2" class="form-label">郵便番号</label>
            <input type="hidden" name="zip1" value="{{ $zip1 }}">
            <input type="hidden" name="zip2" value="{{ $zip2 }}">
            <div class="">{{ $zip1 }} - {{ $zip2 }}</div>
        </div>

        <div class="mb-3">
            <label for="address1" class="form-label">住所</label>
            <input type="hidden" name="address1" value="{{ $address1 }}">
            <input type="hidden" name="address2" value="{{ $address2 }}">
            <div class="">{{ $address1 }}{{ $address2 }}</div>
        </div>

        <div class="mb-3">
            <label for="event_category" class="form-label">イベントカテゴリー</label>
            <input type="hidden" name="category_id" value="{{ $category_id }}">
                <div class="">{{ $categories->name }}</div>
        </div>

        <!-- チーム情報 --->
        <div class="mb-3">
            <input type="hidden" name="team_id" value="{{ $teams->id }}">
            <!-- チーム名 -->
            <div class="form-group">
                チーム名
                <div class="col-sm-6">
                    {{ $teams->name }}
                </div>
            </div>
            <!-- 問い合わせメールアドレス -->
            <div class="form-group">
                問い合わせメールアドレス
                <div class="col-sm-6">
                    {{ $teams->email }}
                </div>
            </div>
            <!-- 問い合わせ連絡先 -->
            <div class="form-group">
                問い合わせ連絡先
                <div class="col-sm-6">
                    {{ $teams->phone }}
                </div>
            </div>
        </div>

        <input type="button" value="修正" onClick="history.back()">
        <button type="submit" class="btn btn-primary btn-block">登録</button>

    </form>
@endsection