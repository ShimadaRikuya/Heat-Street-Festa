<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Event;
use App\Models\Team;
use App\Models\Gatya;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //ユーザーとしてログイン済みかどうか
    }

    public function show(Request $request, $id)
    {
        // user_id取得
        $user = Auth::user();

        //参加チーム 取得
        $teams = User::find($user->id)->teams;

        // teamが投稿したイベントを表示
        $events = Event::whereHas('team', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(5);

         // テンプレート「user/show.blade.php」を表示
        return view('users/show', compact('user', 'events', 'teams'));
    }

    public function edit()
    {
        $user = Auth::user();

        $tiket = Gatya::find($user->gatya_id)->first();

         // テンプレート「user/edit.blade.php」を表示
        return view('users/edit', compact('user', 'tiket'));
    }

    public function update($id, UserRequest $request) {
        $user = Auth::user();
        $form = $request->all();

        $profilePicture = $request->file('profile_picture');
        if ($profilePicture != null) {
            $form['profile_picture'] = $this->saveProfilePicture($profilePicture, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/home');
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
}
