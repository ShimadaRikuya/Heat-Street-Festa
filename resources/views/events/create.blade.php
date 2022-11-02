@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <form action="{{ route('events.confirm') }}" enctype="multipart/form-data" method="POST">

        @csrf
        <div class="form-group">
            <label for="event_title" class="col-md-3 form-label">イベント名</label>
            <input type="name" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="inputTitle" aria-describedby="">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="event_discription" class="col-md-3 form-label">イベント概要</label>
            <textarea type="text" name="discription" value="{{ old('discription') }}" class="form-control @error('discription') is-invalid @enderror" rows="3" id="textarea" aria-describedby=""></textarea>
                @error('discription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="col-md-3 form-label" for="file">ファイル</label>
            <figure id="figure">
                <figcaption>画像ファイルのプレビュー</figcaption>
                <img src="" alt="" id="figureImage" style="max-width: 100%">
            <div id="file" class="input-group">
                <input type="file" class="form-control @error('image_uploader') is-invalid @enderror" id="input" name="image_uploader" value="{{ old('image_uploader') }}"  aria-describedby="btnResetFile" multiple>
                   <button type="button" class="btn btn-outline-secondary reset" id="btnResetFile">取消</button>
                        @error('image_uploader')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="event_start" class="col-md-3 form-label">開始日</label>
            <input type="date" id="date" name="event_start" class="@error('event_start') is-invalid @enderror" value="{{ old('event_start') }}">
                @error('event_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="event_end" class="col-md-3 form-label">終了日</label>
            <input type="date" id="date" name="event_end" class="@error('event_end') is-invalid @enderror" value="{{ old('event_end') }}">
                @error('event_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="event_time_discription" class="col-md-3 form-label">開催日時の詳細</label>
            <textarea type="text" name="event_time_discription" value="{{ old('event_time_discription') }}" class="form-control  @error('event_time_discription') is-invalid @enderror" id="textarea" aria-describedby=""></textarea>
                @error('event_time_discription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="fee" class="col-md-3 form-label @error('fee') is-invalid @enderror">料金</label>
            <input type="text" name="fee" value="{{ old('fee') }}" class="form-control @error('event_time_discription') is-invalid @enderror" id="inputFee" aria-describedby="">
                @error('fee')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="official_url" class="col-md-3 form-label">公式サイトURL</label>
            <input type="text" name="official_url" value="{{ old('offical_url') }}" class="form-control @error('official_url') is-invalid @enderror" id="textarea" aria-describedby="">
                @error('official_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="venue" class="col-md-3 form-label">会場名</label>
            <input type="text" name="venue" value="{{ old('venue') }}" class="form-control @error('venue') is-invalid @enderror" id="textarea" aria-describedby="">
                @error('venue')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="zip" class="col-md-3 form-label">郵便番号</label>
            <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}" onKeyUp="AjaxZip3.zip2addr(this,'','address1','address2');">
                @error('zip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="address1" class="col-md-3 form-label">都道府県</label>
            <select name="address1" class="form-control @error('address1') is-invalid @enderror">
                <option value="">-- 都道府県 --</option>
                <option value="北海道" @if( old('address1') == '北海道' ) selected @endif>北海道</option>
                <option value="青森県" @if( old('address1') == '青森県' ) selected @endif>青森県</option>
                <option value="岩手県" @if( old('address1') == '岩手県' ) selected @endif>岩手県</option>
                <option value="宮城県" @if( old('address1') == '宮城県' ) selected @endif>宮城県</option>
                <option value="秋田県" @if( old('address1') == '秋田県' ) selected @endif>秋田県</option>
                <option value="山形県" @if( old('address1') == '山形県' ) selected @endif>山形県</option>
                <option value="福島県" @if( old('address1') == '福島県' ) selected @endif>福島県</option>
                <option value="茨城県" @if( old('address1') == '茨城県' ) selected @endif>茨城県</option>
                <option value="栃木県" @if( old('address1') == '栃木県' ) selected @endif>栃木県</option>
                <option value="群馬県" @if( old('address1') == '群馬県' ) selected @endif>群馬県</option>
                <option value="埼玉県" @if( old('address1') == '埼玉県' ) selected @endif>埼玉県</option>
                <option value="千葉県" @if( old('address1') == '千葉県' ) selected @endif>千葉県</option>
                <option value="東京都" @if( old('address1') == '東京都' ) selected @endif>東京都</option>
                <option value="神奈川県" @if( old('address1') == '神奈川県' ) selected @endif>神奈川県</option>
                <option value="新潟県" @if( old('address1') == '新潟県' ) selected @endif>新潟県</option>
                <option value="富山県" @if( old('address1') == '富山県' ) selected @endif>富山県</option>
                <option value="石川県" @if( old('address1') == '石川県' ) selected @endif>石川県</option>
                <option value="福井県" @if( old('address1') == '福井県' ) selected @endif>福井県</option>
                <option value="山梨県" @if( old('address1') == '山梨県' ) selected @endif>山梨県</option>
                <option value="長野県" @if( old('address1') == '長野県' ) selected @endif>長野県</option>
                <option value="岐阜県" @if( old('address1') == '岐阜県' ) selected @endif>岐阜県</option>
                <option value="静岡県" @if( old('address1') == '静岡県' ) selected @endif>静岡県</option>
                <option value="愛知県" @if( old('address1') == '愛知県' ) selected @endif>愛知県</option>
                <option value="三重県" @if( old('address1') == '三重県' ) selected @endif>三重県</option>
                <option value="滋賀県" @if( old('address1') == '滋賀県' ) selected @endif>滋賀県</option>
                <option value="京都府" @if( old('address1') == '京都府' ) selected @endif>京都府</option>
                <option value="大阪府" @if( old('address1') == '大阪府' ) selected @endif>大阪府</option>
                <option value="兵庫県" @if( old('address1') == '兵庫県' ) selected @endif>兵庫県</option>
                <option value="奈良県" @if( old('address1') == '奈良県' ) selected @endif>奈良県</option>
                <option value="和歌山県" @if( old('address1') == '和歌山県' ) selected @endif>和歌山県</option>
                <option value="鳥取県" @if( old('address1') == '鳥取県' ) selected @endif>鳥取県</option>
                <option value="島根県" @if( old('address1') == '島根県' ) selected @endif>島根県</option>
                <option value="岡山県" @if( old('address1') == '岡山県' ) selected @endif>岡山県</option>
                <option value="広島県" @if( old('address1') == '広島県' ) selected @endif>広島県</option>
                <option value="山口県" @if( old('address1') == '山口県' ) selected @endif>山口県</option>
                <option value="徳島県" @if( old('address1') == '徳島県' ) selected @endif>徳島県</option>
                <option value="香川県" @if( old('address1') == '香川県' ) selected @endif>香川県</option>
                <option value="愛媛県" @if( old('address1') == '愛媛県' ) selected @endif>愛媛県</option>
                <option value="高知県" @if( old('address1') == '高知県' ) selected @endif>高知県</option>
                <option value="福岡県" @if( old('address1') == '福岡県' ) selected @endif>福岡県</option>
                <option value="佐賀県" @if( old('address1') == '佐賀県' ) selected @endif>佐賀県</option>
                <option value="長崎県" @if( old('address1') == '長崎県' ) selected @endif>長崎県</option>
                <option value="熊本県" @if( old('address1') == '熊本県' ) selected @endif>熊本県</option>
                <option value="大分県" @if( old('address1') == '大分県' ) selected @endif>大分県</option>
                <option value="宮崎県" @if( old('address1') == '宮崎県' ) selected @endif>宮崎県</option>
                <option value="鹿児島県" @if( old('address1') == '鹿児島県' ) selected @endif>鹿児島県</option>
                <option value="沖縄県" @if( old('address1') == '沖縄県' ) selected @endif>沖縄県</option>
            </select>
                @error('address1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="address2" class="col-md-3 form-label">住所</label>
            <input type="text" name="address2" value="{{ old('address2') }}" class="form-control @error('address2') is-invalid @enderror" id="textarea" aria-describedby="">
                @error('address2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="col-md-3 form-label">イベントカテゴリー</label>
            <select name="category_id" class="@error('category_id') is-invalid @enderror" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="" hidden>カテゴリー</option>
                    <option name="category_ids[]" value="{{ $category->id }}" @if( old('category_id') == $category->id ) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- チーム情報 --->
        <div class="form-group">
            <input type="hidden" name="team_id" value="{{ $teams->id }}">
            <!-- チーム名 -->
            <div class="form-group">
                チーム名
                <div class="col-sm-6">
                    {{ $teams->name }}
                </div>
            </div>
            <!-- 問い合わせメールアドレス -->
            <div class="form-group" >
                問い合わせメールアドレス
                <div class="col-sm-6">
                    {{ $teams->email }}
                </div>
            </div>
            <!-- 問い合わせ連絡先 -->
            <div class="form-group" >
                問い合わせ連絡先
                <div class="col-sm-6">
                    {{ $teams->phone }}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="checkbox1">公開設定</label>
            <input type="hidden" name="form_public" value="0">
            <input type="checkbox" id="checkbox1" name="form_public" value="1">
            <span id="output"></span>
        </div>

        <div class="form-group">
            <label class="custom-control-label" for="invalidCheck">利用規約に同意する</label>
            <input class="custom-control-input @if($errors->has('terms')) is-invalid @endif" type="checkbox" name="terms" value="利用規約に同意します" id="invalidCheck" required>
            @if($errors->has('remarks'))
                <div class="invalid-feedback form-group">{{ $errors->first('terms') }}</div>
            @else
                <div class="invalid-feedback form-group">確認する前に同意する必要があります</div><!--HTMLバリデーション-->
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">確認</button>

    </form>
@endsection