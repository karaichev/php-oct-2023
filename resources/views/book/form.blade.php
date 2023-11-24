@extends('layouts.default')

@section('content')
    <form method="post" action="{{ route('book.store') }}">
        @csrf
        <div>
            <label>
                Название книги<br>
                <input type="text" name="title">
            </label>
        </div>
        <div>
            <label>
                Автор<br>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div>
            <label>
                Количество страниц<br>
                <input type="text" name="author">
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
            <label>
                Описание<br>
                <textarea name="annotation"></textarea>
            </label>
        </div>
        <div><br>
            <button>Сохранить</button>
        </div>
    </form>
@endsection
