<form action="{{ route('mail.invite') }}" method="POST">
    <h1>イベントスタッフへの招待</h1>

    <p>あなたは、{{ $team_name }}のイベントスタッフとして、招待されました。</p>
    <p>以下の参加ボタンをクリックして、スタッフになりましょう!!</p>

    <a href="">参加する！</a>
</form>