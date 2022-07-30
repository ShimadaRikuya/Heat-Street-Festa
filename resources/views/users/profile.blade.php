<div class="profile-form-wrap">
    <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
        <input name="utf8" type="hidden" value="&#x2713;" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
        {{csrf_field()}} 
          <div class="form-group">
              <label for="profile_picture">プロフィール写真</label><br>
                  @if ($user->profile_photo)
                      <p>
                          <img src="{{ asset('storage/images/' . $user->profile_picture) }}" alt="profile_picture" />
                      </p>
                  @endif
              <input type="file" name="profile_picture"  value="{{ old('profile_picture',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
          </div>
      
          <div class="form-group">
              <label for="user_name">名前</label>
              <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
          </div>
      
          <div class="form-group">
              <label for="user_email">メールアドレス</label>
              <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
          </div>
      
          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
    </form>
</div>