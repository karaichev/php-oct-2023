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

function getQueryParams()
{
    if (isset($_SERVER['QUERY_STRING'])) {
        return $_SERVER['QUERY_STRING'];
    }

    return [];
}

$params = getQueryParams();

$headers = getHeaders();

var_dump($params);
