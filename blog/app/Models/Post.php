<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //делаем явную привязку таблиц
    protected $table = 'posts';
    //для возможности изменять таблицу
    protected $guarded = false;

    public function tags(){
        // return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        return $this->belongsToMany(Tag::class, 'post_tags');

    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
