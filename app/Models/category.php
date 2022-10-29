<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    /**
     * カテゴリーの一覧を取得
     */
    public function getLists()
    {
        $categories = Category::orderBy('id','asc')->pluck('name', 'id');
    
        return $categories;
    }
}
