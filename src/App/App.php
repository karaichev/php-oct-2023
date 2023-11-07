<?php

namespace App\App;

class App
{
    private $handle;
    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get(string $path, callable $handle): void
    {
        if ($this->request->getMethod() !== 'GET')
        {
            return;
        }
        if ($path !== $this->request->getUri())
        {
            return;
        }

        $this->handle = $handle;
    }

    public function post(string $path, callable $handle): void
    {
        if ($this->request->getMethod() !== 'POST')
        {
            return;
        }
        if ($path !== $this->request->getUri())
        {
            return;
        }

        $this->handle = $handle;
    }

    public function run(): void
    {
        $handle = $this->handle;
        $handle($this->request);
    }
}


