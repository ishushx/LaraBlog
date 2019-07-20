<div class="card-body">
    @if (count($replies))
        <ul class="list-unstyled">
            @foreach ($replies as $reply)
                <li class="media">
                    <img class="mr-3 img-circle align-self-center" src="{{$reply->gravatar()}}" alt="{{$reply->name}}">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">
                            <span>{{$reply->name}}</span>
                            <span class="text-secondary" style="font-size: 0.5em;">
                        <i class="fa fa-clock ml-2"></i>{{$reply->created_at->diffForHumans()}}
                    </span>
                        </h5>
                        <span class="meta float-right">
                    <button class="btn btn-default btn-xs pull-left text-secondary btn-delete-reply"
                            data-id="{{$reply->id}}">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </span>
                        <div>
                            {{$reply->content}}

                        </div>
                    </div>
                </li>

                @if ( ! $loop->last)
                    <hr>
                @endif

            @endforeach
        </ul>

    @else
        <div class="empty-block">暂无数据 ~_~</div>
    @endif
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-delete-reply').click(function () {
                var id = $(this).data('id');
                swal({
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "输入对应的邮箱地址",
                            type: "text",
                        },
                    },
                }).then((value) => {
                    if (!value) {
                        swal('email地址不能为空', '', 'error');
                    }
                    axios.delete('/replies/' + id, {
                        data: {
                            'email': value,
                        }
                    }).then(function (response) {
                        if (response.status === 204) {
                            swal('成功删除', '', 'success').then(function () {
                                location.reload();
                            });
                        } else {
                            swal('校验失败', '', 'error')
                        }
                    });
                });
            });
        });
    </script>
@stop
