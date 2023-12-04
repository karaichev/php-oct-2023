@extends('layouts.default')

@section('content')
    <x-book-list :books="$books"/>

    @if(isset($page))
        {{ $page->links() }}
    @endif
@endsection
