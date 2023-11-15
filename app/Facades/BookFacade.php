<?php

namespace App\Facades;

use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Book store(StoreBookRequest $request)
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
