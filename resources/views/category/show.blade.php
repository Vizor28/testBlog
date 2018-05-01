@extends('app')

@section('content')




    <div class="col-sm-12">

        <a href="/" class="btn btn-success list-inline mb-3">Назад</a>

        <div class="jumbotron">
            <h1 class="display-4">{{ $result['category']->name }}</h1>
            <p class="lead">{{ $result['category']->description }}</p>
            <div class="update_block mt-3">
                <a href="{{ url('/category/edit',$result['category']->id) }}" class="btn btn-primary">Обновити</a>
                <a href="{{ url('/category/delete',$result['category']->id) }}" class="btn btn-danger">Видалити</a>
                <a href="#" class="btn btn-info" data-type="category" data-toggle="modal" data-target="#comment" data-id="{{ $result['category']->id }}">Коментувати</a>
            </div>
            <div class="comment_block">

                @each('comment.one', $result['category']->comments()->orderBy('id', 'desc')->get(), 'comment')

            </div>
        </div>

        <div class="mb-4 mt-4">

            <a href="{{ url('/post/create', $result['category']->id) }}" class="btn btn-success list-inline">Створити Пост</a>

        </div>

        @foreach($result['category']->posts as $post)

            <div class="col-sm-12 mt-3 border-bottom">

                <div class="lead pb-3">

                    <p class="h4">{{ $post->name }}</p>
                    <div class="update_block mt-3">
                        <a href="{{ url('/post',$post->id) }}" class="btn btn-primary">Детальніше</a>
                        <a href="{{ url('/post/edit',$post->id) }}" class="btn btn-primary">Обновити</a>
                        <a href="{{ url('/post/delete',$post->id) }}" class="btn btn-danger">Видалити</a>
                    </div>
                </div>

            </div>

        @endforeach

    </div>


@endsection