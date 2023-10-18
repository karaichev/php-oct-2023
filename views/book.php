<?php
/** @var Book $book */

use models\Book;

//var_dump('$book');
?>

<h1><?= $book->getTitle() ?></h1>

<h2><?= $book->getAuthor() ?></h2>
