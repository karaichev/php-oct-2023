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
    $j=1;
   if (!empty($_SERVER["QUERY_STRING"])){
        $resquery_p = explode("&",$_SERVER["QUERY_STRING"]);
        for($i=0; $i<count($resquery_p); $i++){
            $pparam = explode("=",$resquery_p[$i]);
            $param+=[$pparam[0].$j =>$pparam[1]];
            $j++;
        }
        return $param;
    }
    return $param;
}

$params = getQueryParams();

$headers = getHeaders();

var_export($params);
var_dump($headers);
