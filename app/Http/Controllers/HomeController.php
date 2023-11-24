<?php

namespace App\Http\Controllers;

use App\Facades\BookFacade;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $books = BookFacade::getPublishedBooks();

        return view('book.index', ['books' => $books]);
    }

    public function create(): View
    {
        $book = new Book();
        $authors = Author::query()->get();

        return view('book.form', ['book' => $book, 'authors' => $authors]);
    }

    public function view(Book $book): View
    {
        return view('book.view', ['book' => $book]);
    }

    public function store(StoreBookRequest $request)
    {
        $book = BookFacade::store(
            $request->data()
        );

        return redirect()->route('book.view', ['book' => $book->id]);
    }
}
