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
    $params =[];
    if (empty($_SERVER['QUERY_STRING'])) {
        return $params;
    }
    $list = explode('&', $_SERVER['QUERY_STRING']);
    foreach ($list as $item) {
        list($key, $value) = explode('=', $item);
        $params[$key] = $value;
    }
    return $params;
}

$params = getQueryParams();

$headers = getHeaders();

var_dump($params);
