<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //// usersとteamsテーブルのidカラムをランダムに並び替え、先頭の値を取得
        $set_user_id = User::select('id')->first();
        $set_team_id = Team::select('id')->first();

        // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
        $team_user = DB::table('team_user')
                        ->where([
                            ['user_id', '=', $set_user_id],
                            ['team_id', '=', $set_team_id]
                        ])->get();

        // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
        if($team_user->isEmpty())
        {
            DB::table('team_user')->insert(
                [
                    'user_id' => $set_user_id,
                    'team_id' => $set_team_id,
                ]
            );
        }
    }
}