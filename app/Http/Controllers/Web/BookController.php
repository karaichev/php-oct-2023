<?php

namespace App\Http\Controllers\Web;

use App\Enums\BookStatus;
use App\Facades\BookFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $statusList = [
            [
                'key' => BookStatus::Published,
                'value' => 'Опубликована',
            ],
            [
                'key' => BookStatus::Draft,
                'value' => 'Черновик',
            ],
        ];

        $authors = Author::query()->get()->map(function ($author) {
            return [
                'key' => $author->id,
                'value' => "$author->name $author->surname",
            ];
        })->toArray();

        return view('books.create', [
            'authors' => $authors,
            'statusList' => $statusList,
        ]);
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = BookFacade::store(
            $request->data()
        );

        return redirect()->route('books.show', ['book' => $book->id]);
    }

    public function search(Request $request)
    {
        $query = Book::query()
            ->where(['status' => BookStatus::Published])
            ->when($request->title, function ($q) use ($request) {
                $q->where('title', 'like', "%$request->title%");
            })
        ;

        $pages = $query->paginate(3);

        $books = $query->get();

        dump($pages->perPage());
        dump($pages->currentPage());
        dump($pages->total());

        dump($request->title);
        dd($books);
    }
}
