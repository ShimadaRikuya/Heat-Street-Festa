<div class="profile-form-wrap">
    <form class="edit_user" enctype="multipart/form-data" action="{{ route('user.update', Auth::user()->id) }}" accept-charset="UTF-8" method="post">
        <input name="utf8" type="hidden" value="&#x2713;" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
            @csrf
            <div class="form-group">
                <label for="profile_picture">プロフィール写真</label><br>
                @if ($user->profile_picture)
                    <img src="{{ Storage::disk('s3')->url("profile_pictures/".$user->profile_picture) }}" class="rounded-circle">
                @else
                    <img src="{{ asset('storage/profiles/user-shape.jpg') }}" class="rounded-circle">
                @endif
                <input 
                    type="file" 
                    name="profile_picture" 
                    value="{{ old('profile_picture',$user->id) }}" 
                    accept="image/jpeg,image/gif,image/png"/>
            </div>
      
          <div class="form-group">
              <label for="user_name">名前</label>
              <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="name" />
          </div>
      
          <div class="form-group">
              <label for="user_email">メールアドレス</label>
              <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="email" />
          </div>
      
          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
    </form>
</div>