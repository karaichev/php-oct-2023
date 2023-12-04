<?php

namespace App\Http\Controllers\Web;

use App\Enums\BookStatus;
use App\Facades\BookFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
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
                'key' => BookStatus::Published->value,
                'value' => 'Опубликована',
            ],
            [
                'key' => BookStatus::Draft->value,
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
        $books = Book::query()
            ->where('title', 'like', "%$request->q%")
            ->orWhere('annotation', 'like', "%$request->q%")
            ->get()
        ;

        return view('books.index', ['books' => $books]);
    }

    public function filter(Request $request): View
    {
        $query = Book::query()
            ->when($request->title, function (Builder $q) use ($request) {
                $q->where('title', 'like', "%$request->title%");
            })
            ->when($request->annotation, function ($q) use ($request) {
                $q->where('annotation', 'like', "%$request->annotation%");
            })
            ->when($request->page_number, function ($q) use ($request) {
                $q->where('page_number', '=', $request->page_number);
            })
        ;

        $page = $query->paginate(4);

        return view('books.index', [
            'books' => $query->get(),
            'page' => $page,
        ]);
    }
}
