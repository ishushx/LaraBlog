<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['name', 'email', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function gravatar()
    {
        $url = 'http://www.gravatar.com/avatar/';
        $hash = md5(strtolower(trim($this->email)));
        return $url.$hash.'?d=identicon&s=52';
    }


}
