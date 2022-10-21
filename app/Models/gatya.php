<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gatya extends Model
{
    use HasFactory;

    // モデルに関連づけるテーブル
    protected $table = 'gatyas';

    // テーブルに関連づける主キー
    protected $primaryKey = 'id';

    // 登録・編集ができるカラム
    protected $fillable = [
      'name',
      'discription',
    ];

    Public function user()
  {
      return $this->belongsTo(User::class);
  }
}
