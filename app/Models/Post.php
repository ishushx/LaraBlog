<?php

namespace App\Models;

use Laravel\Scout\Searchable;

class Post extends Model
{
    use Traits\HotPostHelper;
    use Searchable;

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

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function updateReplyCount()
    {
         $this->reply_count=$this->replies->count();
         $this->save();
    }

    public function searchableAs()
    {
        return 'my_blog_posts';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }
}
