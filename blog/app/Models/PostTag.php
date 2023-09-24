<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'post_tags';
    //для возможности изменять таблицу 
    protected $guarded = false;
}
