<div class="book">
    @if(!empty($book->images->first()))
        <img src="{{ $book->images->first()->url }}" alt="Обложка">
    @endif

    <h3>
        <a href="{{ route('books.show', ['book' => $book->id]) }}">
            {{ $book->title }}
        </a>
    </h3>

    <div class="author">{{ $book->author->name }} {{ $book->author->surname }}</div>

    <div class="annotation">
        {{ $book->annotation }}
    </div>
</div>
