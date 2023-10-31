<?php

class Container {
    private array $binds = [
        \contracts\RepositoryInterface::class => \repository\BookRepository::class,
        \contracts\BookInterface::class => \models\Book::class
    ];

    public function bind(string $abstract, string $concrete):void
    {
        $container = new Container();
        $container->bind($abstract, $concrete);

    }

    public function resolveClass(string $className): mixed
    {
        $reflection = new ReflectionClass($className);
        $deps = [];
        $constructor = $reflection->getConstructor();

        if ($constructor !== null) {
            $params = $constructor->getParameters();
            foreach ($params as $param) {
                $name = $param->getType()->getName();
                if (isset($this->binds[$name])) {
                    $name = $this->binds[$name];
                }
                $deps[] = $this->resolveClass($name);
            }
        }

        return new $className(...$deps);
    }
}
