<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    //делаем явную привязку таблиц
    protected $table = 'tags';
    //для возможности изменять таблицу
    protected $guarded = false;
}
