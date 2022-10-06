<h4>メンバーの招待</h4>

<dd>招待するメンバーを記入してください</dd>

<form action="/mail" method="post">
    @csrf
    <input type="hidden" name="team_id" value="">
    <input type="email" name="email" placeholder="xxxxx@example.com">
    <input type="submit" name="submit" value="送信">
</form>

