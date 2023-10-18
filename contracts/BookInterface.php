<?php

namespace contracts;

interface BookInterface
{
    public function getTitle(): string;
    public function getAuthor(): string;
}
