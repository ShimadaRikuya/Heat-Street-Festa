<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team; //この行を上に追加
use App\Models\User;//この行を上に追加
use Auth;

class TeamController extends Controller
{
    public function create()
    {
        //
        return view('teams.create');
    }

    public function store(Request $request)
    {
        // //バリデーション 
        // $validator = Validator::make($request->all(), [
        //     'team_name' => 'required|max:255'
        // ]);
        
        // //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect('/')
        //         ->withInput()
        //         ->withErrors($validator);
        // }
        
        //以下に登録処理を記述（Eloquentモデル）
        $teams = new Team;
        $teams->name = $request->name;
        $teams->email = $request->email;
        $teams->phone = $request->phone;
        $teams->owner_id = Auth::id();//ここでログインしているユーザidを登録しています
        $teams->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $teams->save();
        
        return redirect()->route('user.show', $user)->with('flash_message', 'チームを作成しました。');
        
    }

    //詳細表示
    public function show(Team $team)
    {
        return view('teams/detail',[
            'team'=> $team,
            ]);
    }

    //チーム編集画面表示
    public function edit (Team $team) 
    {
            
        return view('teams/edit', ['team' => $team]);
             
    }
    
    //更新処理
    public function update (Request $request) 
    {
        // user_id取得
        $user = Auth::user();

        // //バリデーション 
        // $validator = Validator::make($request->all(), [
        //     'team_name' => 'required|max:255',
        // ]);
       
        // //バリデーション:エラー
        // if ($validator->fails()) 
        // {
        //     return redirect('/')
        //         ->withInput()
        //         ->withErrors($validator);
        // }
   
        //対象のチームを取得
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->save();

        return redirect()->route('user.show', $user)->with('flash_message', 'チーム情報を更新しました。');
   
    }

    public function join($team_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $team = Team::find($team_id);
        
        //リレーションの登録
        $team->members()->attach($user);
        
        return redirect('/');
        
    }

    public function select(Request $request, $id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();

        $teams = Team::all();
        
        return view('teams.select',[
            'id' => $id,
            'teams' => $teams,
            ]);
    }
}
