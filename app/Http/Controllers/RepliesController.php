<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(ReplyRequest $request,Post $post,Reply $reply)
    {
        $validated=$request->validated();

        $reply->fill($validated);
        $reply->post_id=$post->id;
        $reply->save();

        return redirect()->to('#reply_list');
    }

    public function destroy(ReplyRequest $request,Reply $reply)
    {
        if ($request->email === $reply->email){
            $reply->delete();
            return response('success',204);
        }else{
            return [] ;
        }

    }
}
