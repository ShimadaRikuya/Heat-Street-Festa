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
      'user_id',
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
      'zip',
      'address1',
      'address2',
      'form_public'
    ];

    protected $casts = [
      'form_public' => 'bool',
    ];

    /**
     * リレーション先(従テーブル)
     *
     * @return void
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * カテゴリーリレーション
     */
    public function Category()
    {
        // 一つの記事は一つのカテゴリに属している
        return $this->belongsTo(Category::class);
    }

    // 公開のみ表示
    public function scopePublic(Builder $query)
    {
       return $query->where('form_public', true)->where('event_end', '>=', now());
    }
  
    // 公開記事一覧取得(イベント間近)
    public function scopePublicList(Builder $query)
    {
       return $query
            ->public()
            ->latest('event_start')
            ->paginate(24);
    }

    // 公開記事一覧取得(イベント最新版)
    public function scopePublicNew(Builder $query)
    {
       return $query
            ->public()
            ->latest('created_at')
            ->paginate(24);
    }
  
    // 公開記事をIDで取得
    public function scopePublicFindById(Builder $query, int $id)
    {
       return $query->public()->findOrFail($id);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // いいね数ランキング
    public static function Ranking()
    {
        $events = Event::withCount('users')
              ->orderBy('users_count', 'desc')
              ->where('event_end', '>=', now())
              ->paginate(24);
        return $events;
    }

    public static function getTrend()
    {
        return self::whereHas('category', function ($query) {
            $query->where('id', 1);
        })->where('event_end', '>=', now())
        ->paginate(24); //プロパティで呼び出す
    }

}
