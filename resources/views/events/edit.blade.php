@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">
        <div class="section_title">編集</div>

        <form action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="event_title" class="col-md-3 form-label">イベント名</label>
                <input type="name" name="title" value="{{ old('title')?: $event->title }}" class="form-control @error('title') is-invalid @enderror" id="inputTitle" aria-describedby="">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label for="event_discription" class="col-md-3 form-label">イベント概要</label>
                <textarea type="text" name="discription" value="{{  old('discription')?: $event->discription  }}" class="form-control @error('discription') is-invalid @enderror" rows="3" id="textarea" aria-describedby="">{{ old('discription')?: $event->discription }}</textarea>
                    @error('discription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label class="form-label" for="file">ファイル</label>
                <figure id="figure">
                    <figcaption>画像ファイルのプレビュー</figcaption>
                    <img src="{{ asset($event->image_uploader) }}" alt="" id="figureImage" style="max-width: 100%">
                <div id="file" class="input-group">
                    <input type="file" name="image_uploader" value="{{ old('image_uploader')?: $event->image_uploader }}" class="form-control @error($event->image_uploader) is-invalid @enderror" id="input" aria-describedby="btnResetFile">
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
                <input type="date" id="date" name="event_start" class="@error('event_start') is-invalid @enderror" value="{{ old('event_start')?: $event->event_start }}">
                    @error('event_start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label for="event_end" class="col-md-3 form-label">終了日</label>
                <input type="date" id="date" name="event_end" class="@error('event_end') is-invalid @enderror" value="{{ old('event_end')?: $event->event_end }}">
                    @error('event_end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label for="event_time_discription" class="col-md-3 form-label">開催日時の詳細</label>
                <textarea type="text" name="event_time_discription" value="{{ old('event_time_discription')?: $event->event_time_discription }}" class="form-control  @error('event_time_discription') is-invalid @enderror" id="textarea" aria-describedby="">{{ old('event_time_discription')?: $event->event_time_discription }}</textarea>
                    @error('event_time_discription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            
            <div class="form-group">
                <label for="fee" class="col-md-3 form-label @error('fee') is-invalid @enderror">料金</label>
                <input type="text" name="fee" value="{{ old('fee')?: $event->fee }}" class="form-control @error('event_time_discription') is-invalid @enderror" id="inputFee" aria-describedby="">
                    @error('fee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label for="official_url" class="col-md-3 form-label">公式サイトURL</label>
                <input type="text" name="official_url" value="{{ old('official_url')?: $event->official_url }}" class="form-control @error('official_url') is-invalid @enderror" id="textarea" aria-describedby="">
                    @error('official_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="form-group">
                <label for="venue" class="col-md-3 form-label">会場名</label>
                <input type="text" name="venue" value="{{ old('venue')?: $event->venue }}" class="form-control @error('venue') is-invalid @enderror" id="textarea" aria-describedby="">
                    @error('venue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="zip" class="col-md-3 form-label">郵便番号</label>
                <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip')?: $event->zip }}" onKeyUp="AjaxZip3.zip2addr(this,'','address1','address2');">
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
                        <option value="{{ old('address1')?: $event->address1 }}" @if( old('address1')?: $event->address1 ) selected @endif>{{ $score }}</option>
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
                <input type="text" name="address2" value="{{ old('address2')?: $event->address2 }}" class="form-control @error('address2') is-invalid @enderror" id="textarea" aria-describedby="">
                    @error('address2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label">イベントカテゴリー</label>
                <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category-id" name="category_id">
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
    
            <div class="mb-3">
                <label for="form_public" class="flexCheckChecked">公開設定</label>
                <input type="hidden" name="form_public" value="0">
                <input type="checkbox" id="form_public" name="form_public" class="form-check-input" value="1" @if($event->form_public) checked @endif onchange="displaySelectedpublic()">

                <span id="output"></span>
            </div>
    
            <button type="submit" class="btn btn-primary btn-block">保存</button>
    
        </form>
    </div>

</div>
@endsection