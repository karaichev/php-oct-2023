@extends('layouts.default')

@section('content')
    <form action="{{ route('user.auth') }}" method="post">
        @csrf
        <input type="text" name="email" >
        <input type="password" name="password">

        <button>Login</button>
    </form>
@endsection
