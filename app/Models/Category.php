<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function getAllCategories()
    {
        $ttl=1440*60;
        return Cache::remember('categories',$ttl,function (){
           return $this->all();
        });
    }
}
