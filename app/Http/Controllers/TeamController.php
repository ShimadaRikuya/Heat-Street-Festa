<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Str; // 指定した長さのランダムな文字列を生成
use App\Models\Team;
use App\Models\Event;
use App\Models\User;
use Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //ユーザーとしてログイン済みかどうか
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(TeamRequest $request)
    {
        $user_id = Auth::id();
        
        //以下に登録処理を記述（Eloquentモデル）
        $teams = new Team;
        $teams->name = $request->name;
        $teams->email = $request->email;
        $teams->phone = $request->phone;
        $teams->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $teams->save();

        $user = User::where('id', $user_id)
                    ->update([
                        'role' => '100'
                    ]);

        //多対多のリレーションもここで登録
        $teams->users()->attach( $user_id );
        
        return redirect()->route('user.show', $user_id)->with('msg_success', 'チームを作成しました。');
        
    }

    //詳細表示
    public function show(Team $team)
    {
        return view('teams/detail',[
            'team' => $team,
            ]);
    }

    //チーム編集画面表示
    public function edit (Team $team) 
    {
        return view('teams/edit', ['team' => $team]);
    }
    
    //更新処理
    public function update (TeamRequest $request) 
    {
        // user_id取得
        $user = Auth::user();
   
        //対象のチームを取得
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->save();

        return redirect()->route('user.show', $user)->with('msg_success', 'チーム情報を更新しました。');
   
    }

    public function join($team_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $team = Team::find($team_id);
        
        //リレーションの登録
        $team->users()->attach($user);
        
        return redirect()->route('user.show', $user)->with('msg_success', 'チームに参加しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $user = Auth::user();
        $team->delete();
        
        return redirect()
            ->route('user.show', $user)
            ->with('msg_success', '削除に成功しました。');
    }

    public function create_invitation_url($team_id)
    {
        $team = Team::find($team_id);

        $team->invite_code = Str::random(30);
        $team->update();

        return redirect()->route('teams.show', $team)->with('msg_success', "招待コードおよび招待URLを生成しました。");
    }

    public function email_join(Request $request, $team_id, $token)
    {
        $team = Team::find($team_id);
        //中間テーブルに所属しているかの確認を取りたいので、途中までクエリをビルドする。
        //$queryは、途中で止めておくことがポイント
        $query = Team::whereHas('users', function ($q) use($team_id) {
            $q->where('team_user.user_id', Auth::id());
            $q->where('team_user.team_id', $team_id);
        })->doesntExist();

        //所属してなければ、参加させる
        if($query){
            //tokenの期限が切れていないか、または、偽物ではないかの確認をする。
            if( $team->invite_code == $token){

                $team->users()->attach(Auth::user());
                User::find(Auth::id())->update([ 'role' => '50' ]);

                return redirect()->to(route('teams.show', $team))->with('msg_success', "メンバーとして参加しました。");

            }else{
                //tokenが腐っているか、偽物ならば、弾いておく。
                return redirect()->to(route('home'))->with('msg_danger', "無効な招待です。再度、招待してもらってください。");      
            }

        }else{
            //所属済みならば、弾いておく。
            return redirect()->to(route('teams.show', $team))->with('msg_success', "あなたは既に所属しています。");
        }   
    }
}
