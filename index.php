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

function getQueryParams():array
{
    $resquery_p = [];

   if (!empty($_SERVER["QUERY_STRING"])){
        $resquery_p = explode("&",$_SERVER["QUERY_STRING"]);
        return $resquery_p;
    }
    return $resquery_p;

}

$params = getQueryParams();

$headers = getHeaders();

print_r($params);
#var_dump($headers);
