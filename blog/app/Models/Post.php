<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //делаем явную привязку таблиц
    protected $table = 'posts';
    //для возможности изменять таблицу 
    protected $guarded = false;

    public function tags(){
        // return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        return $this->belongsToMany(Tag::class, 'post_tags');

    }
}
