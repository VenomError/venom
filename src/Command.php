<?php

namespace VenomError\Venom;

class Command
{


    public string $path;
    public string $class;

    public string $method;
    public $params = [];
    public function __construct(?string $class = '', ?string $method = '', ?array $params = [], ?string $path = '')
    {
        $this->class = $class;
        $this->method = $method;
        $this->params = $params;
        $this->path = $path;
    }
    public function setPath(string $path): void
    {
        $this->path = $path;
    }
    public function getPath(): string
    {
        return $this->path;
    }

    public function cekPath(string $path): bool
    {
        return file_exists($path) && is_readable($path);
    }

    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }
    public function getClass(): string
    {
        return $this->class;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function include(): void
    {
        require_once $this->path;
    }

    public function exit()
    {
        die;
    }

    public function execute(): void
    {
        $class = $this->getClass();
        $method = $this->getMethod();
        $params = $this->getParams();
        if (empty($this->params)) {
            $class::$method();
        } else {
            $class::$method($params);

        }
    }
}