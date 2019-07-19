@foreach(['success','info','warning','danger'] as $msg)
    @if(session()->has($msg))
        <div class="alert alert-dismissible alert-{{$msg}}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">{{session()->get($msg)}}</p>
        </div>
    @endif
@endforeach
