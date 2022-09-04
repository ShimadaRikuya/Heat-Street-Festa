<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // モデルに関連づけるテーブル
    protected $table = 'events';

    // テーブルに関連づける主キー
    protected $primaryKey = 'event_id';

    // 登録・編集ができるカラム
    protected $fillable = [
      'user_id',
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

    //1対多のリレーション追加
    public function user()
    {
    return $this->belongsTo('App\User');
    }

    /**
     * カテゴリーリレーション
     */
    public function Category(){
    // 一つの記事は一つのカテゴリに属している
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    //   /**
    //  * 登録処理 eventsテーブルにデータをinsert
    //  * 
    //  */
    // public function insertEventData($request)
    // {
    //     return $this->create([
    //         'ç' => $request->category_id,
    //         'title' => $request->title,
    //         'discription' => $request->discription,
    //         'image_uploader' => $request->image_uploader,
    //         'event_start' => $request->event_start,
    //         'event_end' => $request->event_end,
    //         'event_time_discription' => $request->event_time_discription,
    //         'fee' => $request->fee,
    //         'official_url' => $request->official_url,
    //         'venue' => $request->venue,
    //         'zip1' => $request->zip1,
    //         'zip2' => $request->zip2,
    //         'address1' => $request->address1,
    //         'address2' => $request->address2,
    //         'form_public' => $request->form_public
    //     ]);
    // }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($event) {
            $event->user_id = \Auth::id();
        });
    }

}
