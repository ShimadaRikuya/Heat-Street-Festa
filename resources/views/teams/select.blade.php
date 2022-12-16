@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 box">
            <div class="title border rounded-pill"><h4 class="title-inner">新規作成</h4></div>
            
            <section class="create_cont">
                <div class="create_cont-inner">
                    @if (!isset($teams[0]))

                        <h3 class="text-center mb-3">主催者の新規作成</h3>
                            <p class="mt-2">イベントを作成するためには、「主催者」に関する情報の登録が必要です。一度登録していただくと、次回イベント作成時には登録不要となります。</p>
                        <div class="text-center">
                            <a href="{{ route('teams.create') }}" class="btn btn-success btn-lg rounded-pill">主催者を登録する</a>
                        </div>

                    @else

                        <form action="{{ route('events.create') }}" method="GET">
                            <h4>主催者<span class="badge bg-success">必須</span></h4>
                            <select name="team" class="form-select">
                                @foreach ($teams as $team)
                                    <option name="team" value="{{ $team->id }}" selected>{{ $team->name }}</option>
                                @endforeach
                            </select>
                            <div class="create_cont-create ps-1">
                                <a href="{{ route('teams.create') }}" class="btn bd-highlight fw-bold text-success">主催者を登録する</a>
                            </div>
                            <!-- Save ボタン/Back ボタン -->
                            <div class="create_cont-btn well well-sm">
                                <a class="btn btn-outline-secondary" href="{{ url('/') }}">戻る</a>
                                <button type="submit" class="btn btn-success">次へ</button>
                            </div>
                            <!--/ Save ボタン/Back ボタン -->
                        </form>
                        
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
@endsection