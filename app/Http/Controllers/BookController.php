<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends Controller
{
    // @route /books
    public function index()
    {
        $books = Book::all();

        return $books;
    }

    // @route /books/{id}
    public function show($id)
    {
        $book = Book::where('id', $id)
            ->first();

        if ($book === null) {
            throw new NotFoundHttpException();
        }

        return $book;
    }
}

/**
 * books
 * ------
 * 1
 * 2
 * 3
 *
 * authors
 * -------
 * 7
 * 8
 * 9
 *
 * books_authors
 * -------------
 * b     |  a
 * -------------
 * 1    |  7
 * 2    |  8
 * 3    |  7
 * 3    |  9
 */
