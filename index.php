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
    $list = explode('&', $_SERVER['QUERY_STRING']);
    $i = 1;
    foreach ($list as $item) {
        $params["param$i"] = $item;
        $i++;
    }
    return $params;
}

$params = getQueryParams();

$headers = getHeaders();

var_dump($params);
