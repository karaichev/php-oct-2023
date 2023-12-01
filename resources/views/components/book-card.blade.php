<div class="card" style="width: 16rem;">
    @if(!empty($book->images->first()))
        <img src="{{ $book->images->first()->url }}" class="card-img-top" alt="Обложка">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('books.show', ['book' => $book->id]) }}">
                {{ $book->title }}
            </a>
        </h5>
        <div class="author">{{ $book->author->name }} {{ $book->author->surname }}</div>
        <div class="card-text">
            {{ $book->annotation }}
        </div>
        <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary">Открыть</a>
    </div>
</div>
