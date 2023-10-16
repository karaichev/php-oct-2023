<?php
function getHeaders(): array
{
    $result = [];
    foreach ($_SERVER as $key => $header) {
        if (str_starts_with($key, 'HTTP_')) {
            $result[$key] = $header;
        }
    }
    return $result;
}

function getQueryParams(): array
{
    $param = [];

    if (empty($_SERVER["QUERY_STRING"])) {
        return $param;
    }

    $resQueryParams = explode("&", $_SERVER["QUERY_STRING"]);

    for ($i = 0; $i < count($resQueryParams); $i++) {
        $pParam = explode("=", $resQueryParams[$i]);

        $param[$pParam[0]] = $pParam[1];
    }

    return $param;
}

$params = getQueryParams();

$headers = getHeaders();

var_export($params);
var_dump($headers);
