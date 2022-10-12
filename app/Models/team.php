<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // モデルに関連づけるテーブル
    protected $table = 'teams';

    // テーブルに関連づける主キー
    protected $primaryKey = 'id';

    // 登録・編集ができるカラム
    protected $fillable = [
        'name',
        'email',
        'phone',
        'owner_id',
        'user_id'
    ];

     // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo(User::class);
    }

    // Userテーブルとの多対多リレーション
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * 従テーブルから主テーブルを引っ張ってくる
     * 1対多のリレーション追加
     * 外部キーがある側は従テーブル
     *
     * @return void
     */
    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function InsertTeam($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'name'               => $request->team_name,
            'email'           => $request->team_email,
            'phone'                 => $request->team_phone,
            'owner_id'           => $request->owner_id,
        ]);
    }
}
