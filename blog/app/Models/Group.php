<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    //делаем явную привязку таблиц
    protected $table = 'groups';
    //для возможности изменять таблицу
    protected $guarded = false;

    public function post(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }


    public function users(){
        return $this->belongsToMany(User::class, 'group_users');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
