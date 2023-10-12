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
    $param = [];

   if (!empty($_SERVER["QUERY_STRING"])){
        $resquery_p = explode("&",$_SERVER["QUERY_STRING"]);
        for($i=0; $i<count($resquery_p); $i++){
            $param_with_val = explode("=",$resquery_p[$i]);
            $param[$param_with_val[0]]=$param_with_val[1];
        }
        return $param;
    }
    return $param;

}

$params = getQueryParams();

$headers = getHeaders();

print_r($params);
#var_dump($headers);
