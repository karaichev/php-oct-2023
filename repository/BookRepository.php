<?php

namespace repository;

use contracts\RepositoryInterface;
use models\Book;

class BookRepository implements RepositoryInterface
{
    public function get(): Book
    {
        $b = new Book();

        $b->setAuthor('Роберт Мартин');
        $b->setTitle('Чистая Архитектура');

        return $b;
    }
}
