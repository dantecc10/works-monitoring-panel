<?php
// Cargar Composer autoload y la clase Dotenv
require_once __DIR__ . '/vendor/autoload.php';

// Usar la clase Dotenv para cargar las variables de entorno desde .env
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Conexión a la base de datos usando mysqli
$connection = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

// Verificar la conexión
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";
