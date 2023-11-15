<?php

namespace App\Http\Controllers;

use App\Facades\BookFacade;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\StoreReviewRequest;
use App\Http\Resources\BookListResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use App\Services\Book\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    public function __construct()
    {
        auth()->login(
            User::query()->inRandomOrder()->first()
        );
    }

    // @route /books
    public function index(): AnonymousResourceCollection
    {
        return BookListResource::collection(Book::all());
    }

    // @route /books/{id}
    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = BookFacade::store($request);

        return response()->json($book->id, 201);
    }

    public function reviewStore(Book $book, StoreReviewRequest $request)
    {
        /** @var Review $review */
        return auth()->user()->reviews()->create([
            'text' => $request->input('text'),
            'rate' => $request->integer('rate'),
            'book_id' => $book->id,
        ]);
    }

    public function update(Book $book): Book
    {
        $data = [];

        if (request()->method() === 'PUT') {
            $data = [
                'title' => request()->input('title'),
                'page_number' => request()->integer('page_number'),
                'annotation' => request()->input('annotation'),
                'author_id' => request()->integer('author_id'),
            ];
        } else {
            if (request()->has('title')) {
                $data['title'] = request()->input('title');
            }
            if (request()->has('page_number')) {
                $data['page_number'] = request()->integer('page_number');
            }
            if (request()->has('annotation')) {
                $data['annotation'] = request()->input('annotation');
            }
            if (request()->has('author_id')) {
                $data['author_id'] = request()->integer('author_id');
            }
        }

        $book->update($data);

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
