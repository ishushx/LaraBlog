@foreach($posts as $post)
    <div class="card border-secondary mb-3">
        <div class="card-body">
            <h3 class="card-title posts-index-title"><a href="{{$post->link()}}" class="post-title" style="color:inherit;">{{$post->title}}</a></h3>
            <hr>
            <p class="card-text">{{$post->excerpt}}</p>
        </div>
        <div class="card-footer text-muted">
            <a href="#"><i class="fa fa-calendar mr-1"></i>{{$post->created_at->format('Y年m月d日')}}</a>
            <a href="#" class="ml-2"><i class="fa fa-folder-open mr-1"></i>{{$post->category->name}}</a>
            <a href="#" class="ml-2"><i class="fa fa-tags mr-1"></i>
                @foreach($post->tags as $tag)
                   {{$tag->name}}
                    @if ( ! $loop->last)
                        ,
                    @endif
                @endforeach
            </a>
            <a href="#" class="ml-2"><i class="fa fa-comment mr-1"></i>{{$post->reply_count}}条评论</a>
            <a href="#" class="ml-2"><i class="fa fa-list-alt mr-1"></i>{{$post->visits()->count()}}次阅览</a>
        </div>
    </div>
@endforeach
