<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('head')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Store</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    </head>
@show
<body>
    <h1 class="title">
        Book Store
    </h1>
    <div class="content">
        @section('content')
        @show
    </div>

    @section('footer')
    @show
</body>
</html>