<?php

namespace App\View\Components;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookCard extends Component
{
    public function __construct(
        public Book $book
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.book-card');
    }
}
