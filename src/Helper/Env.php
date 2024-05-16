<?php
namespace VenomError\Venom\Helper;

use Dotenv\Dotenv;

require_once __DIR__ . "/../../vendor/autoload.php";
class Env
{
    public function __construct()
    {
        Dotenv::createImmutable(__DIR__ . "/../../")->load();
    }
    public static function get(string $key): ?string
    {
        new self();
        return $_ENV[$key] ?? null;
    }


}
