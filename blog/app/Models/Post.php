<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    //делаем явную привязку таблиц
    protected $table = 'posts';
    //для возможности изменять таблицу
    protected $guarded = false;
    protected $withCount = ['likedUsers'];
    protected $with = ['category'];

    public function tags(){
        // return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Добавление тегов в массив для поиска
        $array['tags'] = $this->tags->pluck('id')->toArray();

        return $array;
    }

    public function shouldBeSearchable()
    {
        // return $this->category !== null;
    }

    public function searchableAs(): string
    {
        return 'posts_index';
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'post_id', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }

    // public function toSearchableArray()
    // {
    //     return[
    //         'title' => $this->title,
    //         'content' => $this->content,
    //     ];
    // }
}
