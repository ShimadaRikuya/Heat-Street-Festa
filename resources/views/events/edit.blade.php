@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="box">
            <div class="title border rounded-pill"><h4 class="title-inner">イベント情報の編集</h4></div>

            <section class="create_cont">
                <div class="create_cont-inner">
                    <form action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $event->user_id }}">

                        <div class="form-group mb-4">
                            <label for="event_title" class="form-label">イベント名<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <input 
                                type="name" 
                                name="title" 
                                value="{{ old('title')?: $event->title }}"
                                class="form-control @error('title') is-invalid @enderror" 
                                id="inputTitle"
                                aria-describedby="titleHelp" 
                                placeholder="イベント名">
                            <div id="titleHelp" class="form-text">※64文字までで入力してください。</div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="event_discription" class="form-label">イベント概要<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <textarea 
                                type="text" 
                                name="discription" 
                                class="form-control @error('discription') is-invalid @enderror" 
                                rows="3" 
                                id="textarea" 
                                aria-describedby=""
                                placeholder="イベント概要">{{ old('discription')?: $event->discription }}</textarea>
                                @error('discription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label class="form-label" for="file">ファイル<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <figure id="figure">
                                <img src="{{ Storage::disk('s3')->url("events/$event->image_uploader") }}" alt="" id="figureImage" class="mb-3" style="max-width: 50%;">
                            <div id="file" class="input-group">
                                <input 
                                    type="file" 
                                    class="form-control @error('image_uploader') is-invalid @enderror" 
                                    id="input" 
                                    name="image_uploader" 
                                    aria-describedby="btnResetFile" 
                                    multiple>
                                    @error('image_uploader')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="event_start" class="form-label">開始日<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <input 
                                type="date" 
                                id="date" 
                                name="event_start" 
                                class="form-control @error('event_start') is-invalid @enderror" 
                                value="{{ old('event_start')?: $event->event_start }}">
                                @error('event_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="event_end" class="form-label">終了日<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <input 
                                type="date" 
                                id="date" 
                                name="event_end" 
                                class="form-control @error('event_end') is-invalid @enderror" 
                                value="{{ old('event_end')?: $event->event_end }}">
                                @error('event_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="event_time_discription" class="form-label">開催日時の詳細</label>
                            <textarea 
                                type="text"
                                name="event_time_discription" 
                                class="form-control  @error('event_time_discription') is-invalid @enderror" 
                                rows="3" 
                                id="textarea" 
                                aria-describedby=""
                                placeholder="開催日時の詳細">{{ old('event_time_discription')?: $event->event_time_discription }}</textarea>
                                @error('event_time_discription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="fee" class="form-label @error('fee') is-invalid @enderror">料金</label>
                            <input 
                                type="text" 
                                name="fee" 
                                value="{{ old('fee')?: $event->fee }}"
                                class="form-control @error('event_time_discription') is-invalid @enderror" 
                                id="inputFee" 
                                aria-describedby=""
                                placeholder="料金">
                                @error('fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="official_url" class="form-label">公式サイトURL</label>
                            <input 
                                type="text" 
                                name="official_url" 
                                value="{{ old('official_url')?: $event->official_url }}"
                                class="form-control @error('official_url') is-invalid @enderror" 
                                id="textarea" 
                                aria-describedby=""
                                placeholder="公式URL">
                                @error('official_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="venue" class="form-label">会場名</label>
                            <input 
                                type="text" 
                                name="venue" 
                                value="{{ old('venue')?: $event->venue }}"
                                class="form-control @error('venue') is-invalid @enderror" 
                                id="textarea" 
                                aria-describedby=""
                                placeholder="会場名">
                                @error('venue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="zip" class="form-label">会場住所<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <input 
                                type="text" 
                                name="zip" 
                                value="{{ old('zip')?: $event->zip }}"
                                class="form-control @error('zip') is-invalid @enderror" 
                                onKeyUp="AjaxZip3.zip2addr(this,'','address1','address2');"
                                aria-describedby="zipHelp" 
                                placeholder="会場住所">
                                <div id="zipHelp" class="form-text">※7桁の - 「ハイフン」無しで入力してください。</div>
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="address1" class="form-label">開催都道府県<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <select 
                                name="address1"
                                class="form-select @error('address1') is-invalid @enderror">
                                @foreach(config('pref') as $pref_id => $name)
                                    <option value="{{ $name }}" @if( old('address1', $event->address1 == $pref_id) ) selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('address1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="address2" class="form-label">開催住所<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <input 
                                type="text" 
                                name="address2" 
                                value="{{ old('address2')?: $event->address2 }}"
                                class="form-control @error('address2') is-invalid @enderror" 
                                id="textarea" 
                                aria-describedby=""
                                placeholder="開催住所">
                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label">イベントカテゴリー<span class="badge bg-success ms-2">{{ __('必須') }}</span></label>
                            <select 
                                class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" 
                                id="category-id" 
                                name="category_id">
                                @foreach ($categories as $category)
                                    @if ($event->category_id == $category->category_id)
                                      <option name="category_ids[]" value="{{ old('category_id')?: $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                      <option name="category_ids[]" value="{{ old('category_id')?: $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- チーム情報 --->
                        <div class="form-group mb-4">
                            <input type="hidden" name="team_id" value=" {{ $event->team->id }}">
                            <!-- チーム名 -->
                            <div class="form-group mb-4">
                                <label for="cont_name" class="form-label">チーム名</label>
                                <input 
                                    type="name"
                                    name="cont_name" 
                                    value="{{ $event->team->name }}" 
                                    class="form-control" 
                                    disabled>
                            </div>
                            <!-- 問い合わせメールアドレス -->
                            <div class="form-group mb-4">
                                <label for="cont_email" class="form-label">問い合わせメールアドレス</label>
                                <input 
                                    type="name" 
                                    name="cont_email" 
                                    value="{{ $event->team->email }}" 
                                    class="form-control" 
                                    disabled>
                            </div>
                            <!-- 問い合わせ連絡先 -->
                            <div class="form-group mb-4">
                                <label for="cont_email" class="form-label">問い合わせ連絡先</label>
                                <input 
                                    type="name" 
                                    name="cont_email" 
                                    value="{{ $event->team->phone }}" 
                                    class="form-control" 
                                    disabled>
                            </div>
                        </div>
        
                        <div class="form-group mb-4">
                            <div class="form-label">公開設定</div>
                            <label for="checkbox1" class="form-label">公開する</label>
                                <input 
                                    type="hidden" 
                                    name="form_public" 
                                    value="0">
                                <input 
                                    type="checkbox" 
                                    id="form_public" 
                                    name="form_public" 
                                    class="form-check-input" 
                                    value="1 @if($event->form_public) checked @endif">
                        </div>
        
                        <div class="form-group mb-4">
                            <div class="form-label">利用規約<span class="badge bg-success ms-2">{{ __('必須') }}</span></div>
                            <label class="form-check-label" for="invalidCheck">利用規約に同意する</label>
                            <input 
                                class="form-check-input @if($errors->has('terms')) is-invalid @endif" 
                                type="checkbox" 
                                name="terms" 
                                value="利用規約に同意します" 
                                id="invalidCheck" 
                                checked
                                required>
                            @if($errors->has('terms'))
                                <div class="invalid-feedback mb-4">{{ $errors->first('terms') }}</div>
                            @else
                                <div class="invalid-feedback mb-4">イベント情報を作成するためには、利用規約への同意が必要となります。</div><!--HTMLバリデーション-->
                            @endif
                        </div>
        
                        <!-- ボタン --->
                        <div class="create_cont-btn well well-sm">
                            <a class="btn btn-outline-secondary" href="{{ route('user.show', Auth::id()) }}">戻る</a>
                            <button type="submit" class="btn btn-primary btn-block">保存</button>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
</div>

@endsection