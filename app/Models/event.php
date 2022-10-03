<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    use HasFactory;

    // モデルに関連づけるテーブル
    protected $table = 'events';

    // テーブルに関連づける主キー
    protected $primaryKey = 'id';

    // 登録・編集ができるカラム
    protected $fillable = [
      'team_id',
      'category_id',
      'title', 
      'discription', 
      'image_uploader', 
      'event_start', 
      'event_end', 
      'event_time_discription',
      'fee',
      'official_url',
      'venue',
      'zip1',
      'zip2',
      'address1',
      'address2',
      'form_public'
    ];

    protected $casts = [
      'form_public' => 'bool',
    ];

    //1対1のリレーション追加
    public function Team()
    {
    return $this->hasOne(Team::class);
    }

    /**
     * カテゴリーリレーション
     */
    public function Category(){
    // 一つの記事は一つのカテゴリに属している
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

     // 公開のみ表示
     public function scopePublic(Builder $query)
     {
         return $query->where('form_public', true);
     }
  
     // 公開記事一覧取得
     public function scopePublicList(Builder $query)
     {
         return $query
             ->public()
             ->latest('event_start')
             ->paginate(10);
     }
  
     // 公開記事をIDで取得
     public function scopePublicFindById(Builder $query, int $id)
     {
         return $query->public()->findOrFail($id);
     }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($event) {
            $event->user_id = \Auth::id();
        });
    }
    

}
