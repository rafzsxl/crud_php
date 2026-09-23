<?php
$host = "192.168.10.67";
$dbname = "escola";
$user = "escola";
$pass = "escola";

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    // echo "Conexão realizada com sucesso!";
    return $conexao;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>