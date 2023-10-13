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
        $param_and_value = explode('=', $item);
        $params[$param_and_value[0]] = $param_and_value[1];
    }
    return $params;
}

$params = getQueryParams();

$headers = getHeaders();

var_dump($params);
