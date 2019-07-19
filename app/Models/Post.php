<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title','content','category_id','slug','excerpt'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function link($params = [])
    {
        return route('posts.show', array_merge([$this->id, $this->slug], $params));
    }
}
