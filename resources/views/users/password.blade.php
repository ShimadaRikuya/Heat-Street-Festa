<form class="edit_user" enctype="multipart/form-data" action="{{ route('user.update', Auth::user()->id) }}" accept-charset="UTF-8" method="post">
    <input name="utf8" type="hidden" value="&#x2713;" />
    <input type="hidden" name="id" value="{{ $user->id }}" />
    {{csrf_field()}} 

    <div class="form-group">
        <label for="user_password">パスワード</label>
        <input autofocus="autofocus" class="form-control" type="password" value="{{ old('user_password',$user->password) }}" name="user_password" />
    </div>

    <div class="form-group">
        <label for="user_password_confirmation">パスワードの確認</label>
        <input autofocus="autofocus" class="form-control" type="password" name="user_password_confirmation" />
    </div>

    <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
</form>