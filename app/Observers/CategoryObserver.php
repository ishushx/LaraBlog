<?php

namespace App\Observers;

use Cache;

class CategoryObserver
{
    public function saved()
    {
        Cache::forget('categories');
    }

    public function updated()
    {
        Cache::forget('categories');
    }

    public function deleted()
    {
        Cache::forget('categories');
    }
}

