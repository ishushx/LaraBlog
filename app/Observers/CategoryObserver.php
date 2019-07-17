<?php

namespace App\Observers;

use Cache;

class CategoryObserver
{
    public function saved()
    {
        Cache::forget('categories');
    }
}

