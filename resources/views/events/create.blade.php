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
                @foreach(config('pref') as $key => $score)
                    <option value="" hidden>-- 都道府県 --</option>
                    <option value="{{ $score }}" @if( old('address1') == '{{ $score }}' ) selected @endif>{{ $score }}</option>
                @endforeach
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
                    <option value="" hidden>-- カテゴリー --</option>
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
            <input type="hidden" name="team_id" value=" {{ $team->id }}">
            <!-- チーム名 -->
            <div class="form-group">
                チーム名
                <div class="col-sm-6">
                    {{ $team->name }}
                </div>
            </div>
            <!-- 問い合わせメールアドレス -->
            <div class="form-group" >
                問い合わせメールアドレス
                <div class="col-sm-6">
                    {{ $team->email }}
                </div>
            </div>
            <!-- 問い合わせ連絡先 -->
            <div class="form-group" >
                問い合わせ連絡先
                <div class="col-sm-6">
                    {{ $team->phone }}
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