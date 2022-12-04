<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'following_id',
        'followed_id'
    ];

    protected $fillable = [
        'following_id',
        'followed_id'
    ];

    // インクリメントを無効
    public $timestamps = false;
    public $incrementing = false;

    public function getFollowCount($user_id)
  {
      return $this->where('following_id', '<>', $user_id)->count();
  }

  public function getFollowerCount($user_id)
  {
      return $this->where('followed_id', '<>',  $user_id)->count();
  }
}
