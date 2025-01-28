<?php
// Arquivo de Conexão com o banco de dados

$host = 'localhost';
$dbname = 'login';  // Nome do banco de dados
$username = 'root'; // Seu nome de usuário do banco de dados
$password = '';     // Sua senha do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>