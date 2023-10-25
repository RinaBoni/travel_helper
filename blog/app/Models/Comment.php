<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'comments';
    //для возможности изменять таблицу
    protected $guarded = false;
}
