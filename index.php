<?php
function getHeaders(): array
{
    $result = [];
    foreach ($_SERVER as $key => $header) {
        if (str_starts_with($key, 'HTTP_')){
            $result[$key] = $header;
        }
    }
    return $result;
}

function getQueryParams(): array
{
    return $_GET;
}

$params = getQueryParams();

$headers = getHeaders();

var_dump($params);
