@extends('app')

@section('content')

    <a href="{{ url('/category',$result['post']->category_id) }}" class="btn btn-success list-inline mb-3">Назад</a>


    <div class="col-sm-12">

        <div class="jumbotron">
            <h1 class="display-4">{{ $result['post']->name }}</h1>
            <p class="lead">{{ $result['post']->content }}</p>
            <div class="update_block mt-3">
                <a href="{{ url('/post/edit',$result['post']->id) }}" class="btn btn-primary">Обновити</a>
                <a href="{{ url('/post/delete',$result['post']->id) }}" class="btn btn-danger">Видалити</a>
                <a href="#" class="btn btn-info" data-type="post" data-toggle="modal" data-target="#comment" data-id="{{ $result['post']->id }}">Коментувати</a>
            </div>
            <div class="comment_block">

                @each('comment.one', $result['post']->comments()->orderBy('id', 'desc')->get(), 'comment')

            </div>
        </div>

    </div>


@endsection