<?php

use App\Request;

require __DIR__ . '/autoload.php';

$app = new App\App();

$app->get('/', function () {
    echo 'Home Page!!! ';
});

$app->get('/about', function (Request $request) {
    echo 'About Page!!!' . $request->getUri();
});

// $app->config(...)

$app->run();
