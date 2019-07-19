@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center ">{{$post->title}}    </h3>
                    <p class="text-center text-muted">
                        <i class="fa fa-comment mr-1"></i>{{$post->reply_count}}条评论
                        <i class="fa fa-list-alt mr-1 ml-2"></i>{{$post->visits()->count()}}次阅览
                    </p>

                    <hr>
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>

@stop
