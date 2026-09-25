<?php require_once __DIR__ . '/../includes/functions.php'; 
require_once __DIR__ . '/../login/verifica_user.php'?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/minisistema/style/style.css">
    <title>Atualizar</title>
</head>

<body>
    <h1>Atualizar:</h1>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <br>
    <br>
    <main>
        <h1>Atualiza dados:</h1>
        <form action="" method="post" class="meu-formulario">
            <div class="campo">
                <label for="id">ID:</label>
                <input type="number" name="id" id="id" placeholder="Insira ID para atualizar" required>
            </div>

            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo">
                <label for="turma">Turma:</label>
                <input type="text" name="turma" id="turma">
            </div>

            <div class="campo">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="campo">
                <label for="nasc">Nascimento:</label>
                <input type="date" name="nasc" id="nasc">
            </div>

            <div class="campo">
                <label>Ativo:</label>
                <div class="radio-grupo">
                    <input type="radio" name="ativo" id="ativo-sim" value="true">
                    <label for="ativo-sim">Sim</label>
                    <input type="radio" name="ativo" id="ativo-nao" value="false">
                    <label for="ativo-nao">Não</label>
                </div>
            </div>

            <div class="botoes">
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            atualizar(
                $conexao,
                $_POST['id'],
                $_POST['nome'],
                $_POST['turma'],
                $_POST['nasc'],
                $_POST['ativo'],
                $_POST['email']
            );
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>