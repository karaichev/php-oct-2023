<?php

namespace App\App;

class Request
{
    private array $headers = [];
    private string $method = '';
    private array $params = [];
    private string $uri;
    private string $body;
    private array $parsedBody;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getBody(): string
    {
        if (file_get_contents('php://input') == null)
        {
            return '';
        } else
        {
            $this->body = file_get_contents('php://input');
        }
        return $this->body;
    }

    public function getParsedBody(): array
    {
        if ($this->getBody() === null)
        {
            return [];
        }

    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHeaders(): array
    {
        $result = [];
        foreach ($_SERVER as $key => $header) {
            if (str_starts_with($key, 'HTTP_')){
                $result[$key] = $header;
            }
        }
        $this->headers = $result;
        return $result;
    }
}
