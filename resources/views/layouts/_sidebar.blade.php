<div class="card  border mb-3">
    <div class="card-body">
        <div class="text-center">
            <img src="{{config('gravatar')}}" alt=""
                 class="img-circle">
            <hr>
            <span class="mr-4"><a href="{{config('github_address','http://www.github.com')}}" target="_blank"><i
                        class="fab fa-lg fa-github"></i></a></span>
            <span class="mr-4"><a data-toggle="modal" data-target="#myModal"><i class="fab fa-lg fa-weixin" style="color:#15aabf;"></i></a></span>

            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- 模态框主体 -->
                        <div class="modal-body">
                            <img src="{{config('weixin_img')}}"
                                 alt="">
                        </div>

                    </div>
                </div>
            </div>

            <span><a href="mailto:{{config('email_address','ishushx@gmail.com')}}"><i class="fas fa-lg fa-envelope"
                                                                                      style="color:rgb(229,76,65);"></i></a></span>
        </div>
    </div>
</div>

<div class="card border mb-3">
    <div class="card-body">
        <div class="text-center mt-1 mb-0 text-muted">
            热门文章
        </div>
        <hr class="mt-2">
        @foreach($hot_posts as $hot_post)
            <div>
                <i class="fab fa-hotjar" style="color:#e3342f;"></i>
                <a href="{{route('posts.show',$hot_post->id)}}">《{{$hot_post->title}}》</a>
            </div>
        @endforeach
    </div>
</div>

<div class="card border mb-3">
    <div class="card-body">
        标签列表:
        @foreach($tags as $tag)
            <span class="badge badge-pill badge-info"><a href="{{route('tags.index',$tag->id)}}">{{$tag->name}}</a>
            </span>
        @endforeach
    </div>
</div>
