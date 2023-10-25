<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'post_user_like';
    //для возможности изменять таблицу
    protected $guarded = false;
}
