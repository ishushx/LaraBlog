<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    public function saved(Reply $reply)
    {
        $reply->post->updateReplyCount();
    }

    public function deleted(Reply $reply)
    {
        $reply->post->updateReplyCount();
    }
}
