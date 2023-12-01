<?php

namespace App\Http\Controllers\Web;

use App\Facades\BookFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'create']);
    }

    public function index(): View
    {
        $books = BookFacade::getPublishedBooks();

        return view('books.index', ['books' => $books]);
    }

    public function show(Book $book): View
    {
        return view('books.show', ['book' => $book]);
    }

    public function create(): View
    {
        return view('books.create', [
            'authors' => Author::query()->get()
        ]);
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = BookFacade::store(
            $request->data()
        );

        return redirect()->route('books.show', ['book' => $book->id]);
    }
}
