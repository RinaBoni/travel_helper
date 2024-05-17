<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends QueryFilter{

    public function category_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }


    public function tags($tagIds)
    {
        $tagIdsArray = $this->paramToArray($tagIds);
        return $this->builder->whereHas('tags', function (Builder $query) use ($tagIdsArray) {
            $query->whereIn('tag_id', $tagIdsArray);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('content', 'LIKE', '%'.$search_string.'%');
    }
}
