<?php

use App\App\Request;

require __DIR__ . '/../vendor/autoload.php';

$app = new App\App\App();

$app->get('/', function () {
    echo 'Home Page!!! ';
});

$app->get('/about', function (Request $request) {
    echo 'About Page!!!' . $request->getUri();
});


$app->post('/add', function (Request $request) {
    print_r($request->getParams());
});

$app->post('/add_json', function (Request $request) {
    print_r($request->getBody());
});


// $app->config(...)

$app->run();
