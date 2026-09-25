<?php 
$host = "192.168.10.55";
$dbname = "escola";
$user = "lorena";
$pass = "3004";
try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
        );
} catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
}
?>