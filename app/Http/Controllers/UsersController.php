<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Event;
use App\Models\Team;
use App\Models\Gatya;
use App\Models\Follower;
use Carbon\Carbon;

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
        $all_request = $request->except('profile_picture');

        // saveProfilePicture()で投稿画像のファイル名をDBに保存
        $fileName = $this->saveProfilePicturePro($request->file('profile_picture')); // return file name
        $user->profile_picture = $fileName;

        $user->fill($all_request)->save();
        return redirect()->route('user.show', $user->id)->with('msg_success', 'ユーザー情報を更新しました');
    }

    private function saveProfilePicturePro(UploadedFile $file): string {
        //makeTempPath()で一次保存用のファイルを生成
        $tempPath = $this->makeTempPath();
        //Intervention Imageを使用して、画像をリサイズ後、一時ファイルに保管
        Image::make($file)->fit(100, 100)->save($tempPath);
        
        //Storageファサードを使用して画像ファイルをディスク（s3を選択）にprofile_picturesフォルダに保存
        $filePath = Storage::disk('s3')
                    ->putFile('profile_pictures', new File($tempPath), 'public');
        return basename($filePath);
    }

    //一時ファイル生成して保存パスを生成。
    private function makeTempPath(): string
    {
        //tmpに一時ファイルが生成され、そのファイルポインタを取得
        $tmp_fp = tmpfile();

        //ファイルのメタ情報を取得
        $meta   = stream_get_meta_data($tmp_fp);

        //メタ情報からURI(ファイルのパス)を取得
        return $meta["uri"];
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
