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
        'owner_id',
        'name',
        'email',
        'phone'
    ];

    /**
    * user_idをowner_idカラムに指定
    * １対 多 の１側なので単数形
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
