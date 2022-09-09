@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <form action="{{ route('events.confirm') }}" enctype="multipart/form-data" method="post">

        @csrf
        <div class="mb-3">
        <label for="event_title" class="form-label">タイトル名</label>
        <input type="name" name="title" class="form-control" id="inputTitle" aria-describedby="">
        </div>

        <div class="mb-3">
        <label for="event_discription" class="form-label">イベント概要</label>
        <input type="text" name="discription" value="" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label class="form-label" for="file">ファイル</label>
            <figure id="figure">
                <figcaption>画像ファイルのプレビュー</figcaption>
                <img src="" alt="" id="figureImage" style="max-width: 100%">
            <div id="file" class="input-group">
                <input type="file" class="form-control" id="input" name="image_uploader" aria-describedby="btnResetFile" multiple>
                   <button type="button" class="btn btn-outline-secondary reset" id="btnResetFile">取消</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="event_start" class="form-label">開始日</label>
            <input type="date" id="date" name="event_start" value="">
        </div>

        <div class="mb-3">
            <label for="event_end" class="form-label">終了日</label>
            <input type="date" id="date" name="event_end" value="">
        </div>

        <div class="mb-3">
            <label for="event_time_discription" class="form-label">開催日時の詳細</label>
            <input type="text" name="event_time_discription" value="" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="event_fee" class="form-label">料金</label>
            <input type="text" name="fee" value="" class="form-control" id="inputFee" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="official_url" class="form-label">公式サイトURL</label>
            <input type="text" name="official_url" value="" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">会場名</label>
            <input type="text" name="venue" value="" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="zip1_zip2" class="form-label">郵便番号</label>
            <input type="text" name="zip1" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /> - <input type="text" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" />
        </div>

        <div class="mb-3">
            <label for="address1" class="form-label">住所</label>
            <select name="address1">
                <option value="">-- 都道府県 --</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address2" class="form-label">市区町村</label>
            <input type="text" name="address2" value="" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">イベントカテゴリー</label>
            <select type="text" name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="" hidden>カテゴリー</option>
                    <option name="category_ids[]" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="form_public" class="flexCheckChecked">公開設定</label>
            <input type="hidden" name="form_public" value="0">
            <input type="checkbox" name="form_public" class="form-check-input" value="1">
        </div>

        <div class="mb-3">
            <label class="custom-control-label" for="invalidCheck">利用規約に同意する</label>
            <input class="custom-control-input @if($errors->has('terms')) is-invalid @endif" type="checkbox" name="terms" value="利用規約に同意します" id="invalidCheck" required>
            @if($errors->has('remarks'))
                <div class="invalid-feedback mb-3">{{ $errors->first('terms') }}</div>
            @else
                <div class="invalid-feedback mb-3">確認する前に同意する必要があります</div><!--HTMLバリデーション-->
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">確認</button>

    </form>
@endsection