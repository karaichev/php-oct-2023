<?php

namespace models;

use contracts\BookInterface;

class Book implements BookInterface
{
    private string $title;
    private string $author;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
}
