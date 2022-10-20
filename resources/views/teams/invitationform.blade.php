<h4>メンバーの招待</h4>

@if($team->invite_code)
    <p>招待コード</p>
        <p>{{ $team->invite_code }}</p>

    <p>招待URL</p>
        <p>http://localhost:8573/team/join/{{$team->id}}/{{ $team->invite_code }}</p>
@else
    <p>招待コードを生成するには作成ボタンを押下してください。</p>

    <form action="{{ url('teams/invite/'. $team->id) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-danger">
            作成
        </button>
    </form>
@endif



<dd>招待するメンバーを記入してください</dd>

<form action="/mail" method="post">
    @csrf
    <input type="hidden" name="team_id" value="{{ $team->id }}">
    <input type="hidden" name="invite_code" value="{{$team->invite_code }}">
    <input type="email" name="email" placeholder="xxxxx@example.com">
    <input type="submit" name="submit" value="送信">
</form>

