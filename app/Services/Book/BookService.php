<?php

namespace App\Services\Book;

use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function store(StoreBookRequest $request): Book
    {
        $files = $request->file('images', []);

        $book = new Book([
            'title' => $request->input('title'),
            'page_number' => $request->input('page_number'),
            'annotation' => $request->input('annotation'),
            'author_id' => $request->integer('author_id'),
        ]);

        $book->save();

        foreach ($files as $file) {
            $path = $file->storePublicly();

            $book->images()->create([
                'url' => Storage::url($path),
            ]);
        }

        return $book;
    }
}
