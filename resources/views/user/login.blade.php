@extends('layouts.default')

@section('content')
    <form action="{{ route('user.auth') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="email">
        <input type="password" name="password">
        <button>LOGIN</button>
    </form>
@endsection
