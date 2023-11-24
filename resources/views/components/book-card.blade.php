<div class="book">
    @if(!empty($book->images->first()))
        <img src="{{ url($book->images->first()->url) }}" alt="Обложка">
    @endif

    <h3 class="book-title">{{ $book->title }}</h3>
    <p class="author">{{ $book->author->name }} {{ $book->author->surname }}</p>
    <p>{{ $book->annotation }}</p>
</div>
