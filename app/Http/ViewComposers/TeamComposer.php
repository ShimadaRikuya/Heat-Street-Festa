<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use Auth;
use App\Models\Team;

use Illuminate\View\View;

/**
 * Class TeamComposer
 * @package App\Http\ViewComposers
 */
class TeamComposer
{    
    
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user(); //idが、リクエストされた$userのidと一致するuserを取得
        $teams = Team::where('user_id', '=', $user->id)->get(); //$userによるチームを取得

        $view->with([
            'teams' => $teams,  
            // ... ここに続けて共通で返したいデータを定義
        ]);
        
    }
}