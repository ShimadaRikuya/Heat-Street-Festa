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
    public function members() 
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * 従テーブルから主テーブルを引っ張ってくる
     * 1対1のリレーション追加
     * 外部キーがある側は従テーブル
     *
     * @return void
     */
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
