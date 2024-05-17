<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends QueryFilter{

    public function category_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }


    public function tags($tags)
    {
        $tagIds = $this->paramToArray($tags);
        return $this->builder->whereHas('post.tags', function (Builder $query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        });
    }



    public function search_field($value)
    {
        $this->builder->where(function (Builder $query) use ($value) {
            $query->where('title', 'like', '%' . $value . '%') // Фильтр по названию группы
                ->orWhere('additional_information', 'like', '%'.$value.'%')// Фильтр по тексту в группы
                    ->orWhereHas('post', function (Builder $query) use ($value) {
                        $query->where('title', 'like', '%' . $value . '%') // Фильтр по названию поста
                            ->orWhere('content', 'like', '%' . $value . '%'); // Фильтр по содержанию поста
                    });
        });
    }
}
