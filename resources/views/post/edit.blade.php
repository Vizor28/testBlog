@extends('app')

@section('content')

    <div class="col-sm-12">
        @if (isset($result['id']))
            <h1 class="d-inline mr-4">Редагування поста</h1>
        @else
            <h1 class="d-inline mr-4">Створення поста</h1>
        @endif
            <a href="/" class="btn btn-success list-inline">Назад</a>
    </div>

    <div class="col-sm-12 mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ $result['url'] }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ $result['name'] }}" />
            </div>
            <div class="form-group">
                <label for="description">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{ $result['content'] }}</textarea>
            </div>

            <div class="form-group mb-4">
                <input type="file"  id="file" name="f" />
            </div>

            <input type="hidden" name="category_id" value="{{ $result['category_id'] }}">

            @if (isset($result['id']))

                <input type="hidden" name="id" value="{{ $result['id'] }}" />

                <input type="submit" class="btn btn-success" value="Обновити" />

            @else

                <input type="submit" class="btn btn-success" value="Створити" />

            @endif


        </form>

    </div>


@endsection