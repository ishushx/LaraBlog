@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('posts._posts',['posts'=>$posts])
            {!! $posts->render() !!}
        </div>
        <div class="col-md-4 col-md-offset-1">
            @include('layouts._sidebar')
        </div>
    </div>
@stop
