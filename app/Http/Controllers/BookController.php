<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // @route /books
    public function index()
    {
        // ...
        return ['book1', 'book2'];
    }

    // @route /books/{id}
    public function show($id)
    {
        // ...
        return 'book' . $id;
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
