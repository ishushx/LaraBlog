@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$post->title}}</h3>
                    <hr>
                    <p class="card-text">{!! $post->content !!}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>

@stop
