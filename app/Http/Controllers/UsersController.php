<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Event;
use App\Models\Team;
use App\Models\Gatya;
use App\Models\Follower;

use Intervention\Image\Facades\Image; // Imageファサードを使う

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //ユーザーとしてログイン済みかどうか
    }

    public function index(Request $request, $user_name, Follower $follower)
    {
        // user_id取得
        $user = User::where('name', '=', $user_name)->first();

        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        // teamが投稿したイベントを表示
        $events = Event::with(['team.user'])
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(5);

        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/', '', $user_flg);

         // テンプレート「user/index.blade.php」を表示
        return view('users/index', compact('user', 'events', 'user_flg', 'follow_count', 'follower_count'));
    }

    public function show(Request $request, $id, Follower $follower)
    {
        // user_id取得
        $user = Auth::user();
        $is_following = $user->isFollowing($user->id);
        $is_followed = $user->isFollowed($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        //参加チーム 取得
        $teams = User::find($user->id)->teams;

        // 投稿したイベントを表示
        $events = Event::whereHas('team', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(5);
        
        $likes = Event::whereHas('users', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(5);

        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/', '', $user_flg);

         // テンプレート「user/show.blade.php」を表示
        return view('users/show', compact('user', 'events', 'teams', 'user_flg', 'follow_count', 'follower_count', 'likes'));
    }

    public function edit()
    {
        $user = Auth::user();

        $tiket = Gatya::find($user->gatya_id);

         // テンプレート「user/edit.blade.php」を表示
        return view('users/edit', compact('user', 'tiket'));
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $form = $request->all();

        $profilePicture = $request->file('profile_picture');
        if ($profilePicture != null) {
            $form['profile_picture'] = $this->saveProfilePicture($profilePicture, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect()->route('user.show', $user->id)->with('flash_message', 'ユーザー情報を更新しました');
    }

    private function saveProfilePicture($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }

    // フォロー
    public function follow(User $user)
    {
       $follower = Auth::user();
       // フォローしているか
       $is_following = $follower->isFollowing($user->id);
       if(!$is_following) {
           // フォローしていなければフォローする
           $follower->follow($user->id);
           return back();
       }
    }
 
    // フォロー解除
    public function unfollow(User $user)
    {
       $follower = Auth::user();
       // フォローしているか
       $is_following = $follower->isFollowing($user->id);
       if($is_following) {
           // フォローしていればフォローを解除する
           $follower->unfollow($user->id);
           return back();
       }
    }
}
