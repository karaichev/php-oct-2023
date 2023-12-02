@extends('layouts.default')

@section('content')
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-input-text
                :label="__('validation.attributes.book.title')"
                :name="'title'" :id="'title'" :errors="$errors->get('title')"
                :value="old('title')"
        />
        <x-input-text :label="'Обложка'" :name="'images[]'" :id="'images'" :type="'file'" :multiple="true" />
        <x-input-text :label="'Количество страниц'" :name="'page_number'" :id="'page_number'" />
        <x-input-text :label="'Описание'" :name="'annotation'" :id="'annotation'" />

        <x-input-select
            :label="'Статус'"
            :name="'status'"
            :id="'status'"
            :options="$statusList"
        />

        <x-input-select
            :label="'Автор'"
            :name="'author_id'"
            :id="'author_id'"
            :options="$authors"
        />

        <div>
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
