<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    //делаем явную привязку таблиц
    protected $table = 'categories';
    //для возможности изменять таблицу
    protected $guarded = false;
}
