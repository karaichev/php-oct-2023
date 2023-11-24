@extends('layouts.default')

@section('content')
    <x-book-list :books="$books" />
@endsection
