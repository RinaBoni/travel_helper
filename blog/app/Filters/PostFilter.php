<?php

namespace App\Filters;

class PostFilter extends QueryFilter{
    public function district($district){
        return $this->builder->where('district', $district);
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}
