@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (!isset($teams[0]))

            <h1>主催者の新規作成</h1>
                <p>イベントを作成するためには、「主催者」に関する情報の登録が必要です。一度登録していただくと、次回イベント作成時には登録不要となります。</p>
            <div class="ps-1 bd-highlight"><a class="btn" href="{{ route('teams.create') }}" role="button">主催者を登録する</a></div>

        @else

            <form action="{{ route('events.create') }}" method="get" class="form-horizontal">
                <h1>主催者</h1>
                <select name="team_id">
                    @foreach ($teams as $team)
                        <option name="team_id" value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                <div class="ps-1 bd-highlight"><a class="btn" href="{{ route('teams.create') }}" role="button">主催者を登録する</a></div>

                <!-- Save ボタン/Back ボタン -->
                <div class="well well-sm">
                    <a class="btn btn-link pull-right" href="{{ url('/') }}"> 戻る</a>
                    <button type="submit" class="btn btn-primary">次へ</button>
                </div>
                <!--/ Save ボタン/Back ボタン -->
            </form>
        
        @endif
    </div>
</div>
@endsection