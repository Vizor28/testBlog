@extends('app')

@section('content')

    <div class="col-sm-12">
        @if (isset($result['id']))
            <h1 class="d-inline mr-4">Редагування категорії</h1>
        @else
            <h1 class="d-inline mr-4">Створення категорії</h1>
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
        <form action="{{ $result['url'] }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ $result['name'] }}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ $result['description'] }}</textarea>
            </div>

            @if (isset($result['id']))

                <input type="hidden" name="id" value="{{ $result['id'] }}" />

                <input type="submit" class="btn btn-success" value="Обновити" />

            @else

                <input type="submit" class="btn btn-success" value="Створити" />

            @endif


        </form>

    </div>


@endsection