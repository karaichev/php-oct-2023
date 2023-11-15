<?php

namespace App\Facades;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\StoreReviewRequest;
use App\Models\Book;
use App\Models\Review;
use App\Services\Book\BookService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Book store(StoreBookRequest $request)
 * @method static Collection getPublishedBooks()
 * @method static BookService setBook(Book $book)
 *
 * @see \App\Services\Book\BookService
 */
class BookFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'book';
    }
}
