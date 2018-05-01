@extends('app')

@section('content')

    <a href="{{ url('/category/create') }}"  class="btn btn-success m-3">Створити категорію</a>

    @foreach($result['categories'] as $cat)

        <div class="col-sm-12 mt-3 border-bottom">

            <div class="lead pb-3">

                <p class="h4">{{ $cat->name }}</p>
                <div class="update_block mt-3">
                    <a href="{{ url('/category',$cat->id) }}" class="btn btn-primary">Детальніше</a>
                    <a href="{{ url('/category/edit',$cat->id) }}" class="btn btn-primary">Обновити</a>
                    <a href="{{ url('/category/delete',$cat->id) }}" class="btn btn-danger">Видалити</a>
                </div>
            </div>

        </div>

    @endforeach


@endsection