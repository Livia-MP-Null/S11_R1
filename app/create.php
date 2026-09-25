
<?php 
require_once __DIR__ . '/../includes/functions.php'; 
require_once __DIR__ . '/../login/verifica_user.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/minisistema/style/style.css">
    <title>Cadastrar</title>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h1>Cadastro de aluno:</h1>
        <form action="" method="post">
            <label for="Nome">Nome:</label>
            <input type="text" name="nome" id="nome"><br>
            <label for="turma">Turma:</label>
            <input type="text" name="turma" id="turma"><br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email"><br>
            <label for="nasc">Nascimento:</label>
            <input type="date" name="nasc" id="nasc"><br>
            <label for="ativo">Ativo:</label>
            <input type="radio" name="ativo" id="ativo" value="true">
            <label for="ativo">Sim</label>
            <input type="radio" name="ativo" id="ativo" value="false">
            <label for="ativo">Não</label>
            <br>
            <input type="submit" value="Cadastrar">
            
            <input type="reset" value="Limpar">
        </form>
    </main>
        <?php
        // Esse if serve para o php somente comece no momento em que o formulário seja submetido
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['nome']; 
            $nasc = $_POST['nasc'];
            $turma = $_POST['turma'];
            $ativo = (bool)$_POST['ativo']; // Forçamos a váriavel a ser booleana
            $email = $_POST['email'];
            cadastrar($conexao, $name, $turma, $nasc, $ativo, $email); // Chamamos  helpers.php
            }
            include __DIR__ . '/../includes/footer.php'; //Vemos que o footer está nos includes
            ?>
    </main>
</body>

</html>