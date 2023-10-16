<?php

namespace App;

class Request
{
    private array $headers = [];
    private string $method = '';
    private array $params = [];
    private string $uri = '';

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
