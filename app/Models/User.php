<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'email',
        'profile_picture',
        'gender',
        'phone',
        'role',
        'gatya_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Teamsテーブルとのリレーション （主テーブル側）
    public function o_teams() {
        return $this->hasMany(Team::class);
    }

    // Teamsテーブルとの多対多リレーション
    public function teams() 
    {
        return $this->belongsToMany(Team::class);
    }

    // Teamsテーブルとの1対多リレーション
    public function team() 
    {
        return $this->belongsTo(Team::class);
    }

    public function gatya()
    {
        return $this->belongsTo(Gatya::class);
    }

     public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'following_id');
    }
 
    public function follows()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'followed_id');
    }

    // フォローする
    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }
   
    // フォロー解除する
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }
   
    // フォローしているか
    public function isFollowing($user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }
   
    // フォローされているか
    public function isFollowed($user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }

    public function likes()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
}
