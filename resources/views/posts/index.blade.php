@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8">
            @include('layouts._message')
            @include('posts._posts',['posts'=>$posts])
            <div class="float-right">
                {!! $posts->render() !!}
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-none d-md-block">
            @include('layouts._sidebar',[$hot_posts,$tags])
        </div>
    </div>
@stop
