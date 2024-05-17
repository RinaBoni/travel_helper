<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'images';
    //для возможности изменять таблицу
    protected $guarded = false;

    public function post(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
