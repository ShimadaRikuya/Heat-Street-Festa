
<h1>イベントスタッフへの招待</h1>


<p>あなたは、{{ $team->name }}チームのスタッフメンバーとして、招待されました。</p>
<p>下記のリンクをクリックして、チームのメンバーになりましょう!!</p>

<p>「{{ $team->name }}」に参加する</p>
<a href="{{ url('teams/email_join/' . $team->id . '/' . $team->invite_code) }}">{{ $invite_url }}</a>