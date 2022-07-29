@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
    <form>

        <div class="mb-3">
        <label for="event_title" class="form-label">タイトル名</label>
        <input type="name" class="form-control" id="inputTitle" aria-describedby="">
        </div>

        <div class="mb-3">
        <label for="event_description" class="form-label">イベント概要</label>
        <input type="discription" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label class="form-label" for="file">ファイル（複数選択可）</label>
            <div id="file" class="input-group">
                <input type="file" class="form-control" id="FormFile" name="form[file][]" aria-describedby="btnResetFile" multiple>
                   <button type="button" class="btn btn-outline-secondary reset" id="btnResetFile">取消</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="event_start" class="form-label">開始日</label>
            <input type="date" id="date">
        </div>

        <div class="mb-3">
            <label for="event_end" class="form-label">終了日</label>
            <input type="date" id="date">
        </div>

        <div class="mb-3">
            <label for="event_time_discription" class="form-label">開催日時の詳細</label>
            <input type="discription" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="event_time_discription" class="form-label">料金</label>
            <input type="text" class="form-control" id="inputFee" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="official_url" class="form-label">公式サイトURL</label>
            <input type="text" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">会場名</label>
            <input type="text" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="venue_address" class="form-label">郵便番号</label>
            <input type="text" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="venue_address" class="form-label">市区町村</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>---</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address1" class="form-label">住所</label>
            <input type="text" class="form-control" id="textarea" aria-describedby="">
        </div>

        <div class="mb-3">
            <label for="event_category" class="form-label">イベントカテゴリー</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>---</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="form_public" class="flexCheckChecked">公開設定</label>
            <input type="checkbox" class="form-check-input" id="flexCheckChecked">
        </div>

        <div class="mb-3">
            <label for="terms_of_service" class="flexCheckChecked">利用規約</label>
            <input type="checkbox" class="form-check-input" id="flexCheckChecked">
        </div>


    </form>
@endsection