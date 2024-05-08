<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    //делаем явную привязку таблиц
    protected $table = 'pictures';
    //для возможности изменять таблицу
    protected $guarded = false;

    protected $fillable = [
        'image'
    ];

    public function user(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
