<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Reply;

class ReplyObserver
{
    public function saved(Reply $reply)
    {
        $reply->post->updateReplyCount();
    }
}
