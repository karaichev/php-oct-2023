<?php

use controllers\BookController;

require 'autoload.php';

$container = new Container();

$bc = $container->resolveClass(BookController::class);

$bc->view();
