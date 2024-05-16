<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'image_posts';
    //для возможности изменять таблицу
    protected $guarded = false;
}
