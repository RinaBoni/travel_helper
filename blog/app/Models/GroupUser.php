<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;
    //делаем явную привязку таблиц
    protected $table = 'group_users';
    //для возможности изменять таблицу
    protected $guarded = false;
}
