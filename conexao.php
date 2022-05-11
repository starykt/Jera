<?php

$dsn = 'mysql:dbname=filmes;host=;charset=utf8';
$user= '';
$password = '';

$conexao = null;

try {
    $conexao = new PDO($dsn, $user, $password);
}catch (PDOException $e) {
    echo "Falha ao conectar no banco de dados";
    exit;
}