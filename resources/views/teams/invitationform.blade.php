<h4>メンバーの招待</h4>

<dd>招待するメンバーを記入してください</dd>

<form action="/mail" method="post">
    @csrf
    <input type="name" name="name" placeholder="プロモ タロウ">
    <input type="email" name="email" placeholder="xxxxx@example.com">
    <select name="team_id">
        @foreach ($teams as $team)
            <option name="team_id" value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
    <input type="submit" name="submit" value="送信">
</form>

