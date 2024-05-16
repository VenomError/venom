<?php

class Venom
{
    public static function start(?array $params = []): void
    {
        exec("cd public/ && php -S localhost:8404");
    }

}