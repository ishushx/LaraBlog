<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            Laravel Blog
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                @foreach($categories as $category)
                    <li class="nav-item {{ category_nav_active($category->id) }}"><a class="nav-link font-weight-bold" href="{{ route('categories.show', $category->id) }}">{{$category->name}}</a></li>
                @endforeach
            </ul>

            <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input name="keyword" id="keyword" type="text" class="form-control border-primary rounded-search" placeholder="搜索..."/>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary border-left-0"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
