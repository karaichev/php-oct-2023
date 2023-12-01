@extends('layouts.default')

@section('content')
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>
                Название книги<br>
                <input type="text" name="title" class="@error('title') error @enderror">
                @error('title')
                <div class="error">{{ $message }}</div>
                @enderror
            </label>
        </div>
        <div>
            <label>
                Обложка<br>
                <input type="file" name="images[]" multiple>
            </label>
        </div>
        <div>
            <label>
                Количество страниц<br>
                <input type="text" name="page_number">
            </label>
        </div>
        <div>
            <label>
                Описание<br>
                <input type="text" name="annotation">
            </label>
        </div>
        <div>
            <label>
                Автор<br>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div>
            <label>
                Статус<br>
                <select name="status">
                    <option value="{{ \App\Enums\BookStatus::Published }}">Опубликована</option>
                    <option value="{{ \App\Enums\BookStatus::Draft }}">Черновик</option>
                </select>
            </label>
        </div>
        <div>
            <br>
            <button>Сохранить</button>
        </div>
    </form>
@endsection
