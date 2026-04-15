<?php

class DB
{
    private $pdo;

    private $localConfig = [
        'host' => 'localhost',
        'name' => 'dmg',
        'user' => 'dmg',
        'pass' => 'dmg',
    ];

    private $productionConfig = [
        'host' => 'localhost',
        'name' => 'klas4s24_585677',
        'user' => 'klas4s24_585677',
        'pass' => '7BhmpKRX',
    ];

    public function __construct()
    {
        $config = $this->isLocalhost() ? $this->localConfig : $this->productionConfig;

        // Optioneel: overschrijf met environment-variabelen als die zijn ingesteld.
        $config['host'] = getenv('DB_HOST') ?: $config['host'];
        $config['name'] = getenv('DB_NAME') ?: $config['name'];
        $config['user'] = getenv('DB_USER') ?: $config['user'];
        $config['pass'] = getenv('DB_PASS') ?: $config['pass'];

        try {
            $this->pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['name']};charset=utf8mb4",
                $config['user'],
                $config['pass'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Databaseverbinding mislukt: ' . $e->getMessage()]);
            exit;
        }
    }

    private function isLocalhost()
    {
        if (php_sapi_name() === 'cli') {
            return true;
        }

        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
        $host = strtolower($host);

        return str_contains($host, 'localhost')
            || str_contains($host, '127.0.0.1')
            || $host === '[::1]';
    }

    public function connect()
    {
        return $this->pdo;
    }
}

$db = new DB();
$pdo = $db->connect();
