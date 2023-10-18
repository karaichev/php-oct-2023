<?php

namespace controllers;

use contracts\RepositoryInterface;

class BookController
{
    public function __construct(private readonly RepositoryInterface $bookRepository)
    {
    }

    public function view(): void
    {
        $book = $this->bookRepository->get();

        include __DIR__ . '/../views/book.php';
    }
}
