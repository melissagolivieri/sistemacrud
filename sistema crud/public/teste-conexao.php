<?php
require_once __DIR__ . '/../src/Database.php';

use App\Database;

try {
    $pdo = Database::getConnection();
    $versao = $pdo->query('SELECT VERSION() AS v')->fetch();
    $tabelas = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

    echo '<h3>Conexão OK!</h3>';
    echo 'MySQL versão: ' . htmlspecialchars($versao['v']) . '<br>';
    echo 'Tabelas: ' . implode(', ', $tabelas);
} catch (Throwable $e) {
    echo 'Falha: ' . htmlspecialchars($e->getMessage());
}