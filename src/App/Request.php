<?php

namespace App\App;

class Request
{
    private array $headers = [];
    private string $method = '';
    private array $params = [];
    private string $uri;

    private   $body = null;

    private  $parsedBody = [];


    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];

        if($this->method === 'GET') {
            $this->params = $_GET;
        }
        if($this->method === 'POST'){
            $this->params = $_POST;
        }

    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
    public function  getBody()
    {
      if (isset($this->body)){
            $this->body = file_get_contents('php://input');
      }
       return $this->body;
    }
    public function getParams():array
    {
        return $this->params;
    }
    public function getHeaders():array
    {
        $result = [];
        foreach ($_SERVER as $key => $header) {
            if (str_starts_with($key, 'HTTP_')){
                $result[$key] = $header;
            }
        }
        $this->headers = $result;
        return $this->headers;
    }


}

