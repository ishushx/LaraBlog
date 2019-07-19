@foreach($posts as $post)
    <div class="card border mb-3">
        <div class="card-body">
            <h3 class="card-title"><a href="{{$post->link()}}" class="post-title" style="color:inherit;">{{$post->title}}</a></h3>
            <hr>
            <p class="card-text">{{$post->excerpt}}</p>
        </div>
        <div class="card-footer text-muted">
            {{$post->created_at->diffForHumans()}}
        </div>
    </div>
@endforeach
