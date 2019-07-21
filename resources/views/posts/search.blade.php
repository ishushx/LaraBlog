@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between text-muted">
                    <span class="">搜索关键字为: {{$keyword}} </span>
                    <span class="">共搜索到: {{count($posts)}} 条记录</span>
                    <span class="">by algolia<i class="fab fa-algolia ml-1"></i></span>
                </div>
                <div class="card-body">
                    @if (count($posts)>0)
                        @include('posts._posts',$posts)
                    @else
                        未搜索到结果!
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
