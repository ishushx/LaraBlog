@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-9">
            {{-- content --}}
            <div id="post_content" class="card">
                <div class="card-body">
                    <h3 class="card-title text-center ">{{$post->title}}    </h3>
                    <p class="text-center text-muted">
                        <i class="fa fa-comment mr-1"></i>{{$post->reply_count}}条评论
                        <i class="fa fa-list-alt mr-1 ml-2"></i>{{$post->visits()->count()}}次阅览
                    </p>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-pill badge-info mt-0 mb-0">{{$tag->name}}</span>
                    @endforeach

                    <hr>
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div id="reply_form" class="reply-form card mt-4">
                <div class="card-header">
                    <h5>发表评论</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('replies.front.store',$post->id).'#reply_form'}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">用户名:</label>
                            <div class="col-md-10">
                                <input type="text" id="name" name="name"
                                       class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"
                                       required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">邮箱地址:</label>
                            <div class="col-md-10">
                                <input type="text" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-2 col-form-label text-md-left">评论内容:</label>
                            <div class="col-md-10">
                                <textarea cols="3" rows="3" id="content" name="content"
                                          class="form-control @error('email') is-invalid @enderror"
                                          value="{{old('content')}}" required></textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <button class="form-control btn btn-success col-md-6 offset-md-3"><i
                                    class="fa fa-reply"></i>发表评论
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div id="reply_list" class="reply card mt-4">
                @include('posts._replies',$replies)
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($previousID === null)
                        <button type="button" class="btn btn-info float-left"><a href="#">上一篇:无</a></button>
                        <button type="button" class="btn btn-info float-right"><a
                                href="{{route('posts.show',$nextID)}}">下一篇</a></button>
                    @elseif ($nextID ===null)
                        <button type="button" class="btn btn-info float-left"><a
                                href="{{route('posts.show',$previousID)}}">上一篇</a></button>
                        <button type="button" class="btn btn-info float-right"><a href="#">下一篇:无</a></button>
                    @else
                        <button type="button" class="btn btn-info float-left"><a
                                href="{{route('posts.show',$previousID)}}">上一篇</a></button>
                        <button type="button" class="btn btn-info float-right"><a
                                href="{{route('posts.show',$nextID)}}">下一篇</a></button>
                    @endif

                </div>
            </div>
        </div>
    </div>

@stop


